<?php

namespace App\Http\Controllers\API;


use App\Question;
use App\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function answer(Request $request){
        $session_id = $request['session_id'];
        $user_id = (int)$request['user_id'];
        $answers = json_decode($request['answers'],1);
        $question_list = $request['question_list'];
        $return = [];

        foreach ($answers as $question_id => $answer){
            $question_id = (int) $question_id;
            $check = Session::where(["question_id"=>$question_id,"session_id"=>$session_id,"user_id"=>$user_id])->get()->count();
            if($check==0) {
                $question = Question::find($question_id);
                $real_answer = $question->answer;
                $session = new Session;
                $session->session_id = $session_id;
                $session->question_id = $question_id;
                $session->user_id = $user_id;
                $session->answer = $answer;
                $session->real_answer = $real_answer;
                $session->question_list = $question_list;
                $session->save();
                $return[$question_id] = $answer == $real_answer;
            }
        }

        return response()->json(['results'=>$return],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function statistics(Request $request){
        $user_id = (int) $request->user_id;
        $return = [];
        $sessions = Session::where("user_id",$user_id)->groupBy("session_id")->get();
        foreach ($sessions as $session){
            $results = Session::where("session_id",$session["session_id"])->get();
            $returnSession = [];
            foreach ($results as $result){
                $returnSession[] = ["question_id"=>$result["question_id"],"session_id"=>$result["session_id"],"answer"=>$result["answer"],"correct_answer"=>$result["real_answer"],"time"=>$result["created_at"],"timestamp"=>$this->asDateTime($result["created_at"])];
            }
            $return[$session["session_id"]] = $returnSession;
        }
        if(count($return))
            $status = 'successful';
        else
            $status = 'error';
        return response()->json(['status'=>$status,'results'=>$return],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function session_statistics(Request $request){
        $user_id = (int) $request->user_id;
        $session_id = (int) $request->session_id;
        $return = [];
        $sessions = Session::where(["session_id"=>$session_id,"user_id"=>$user_id])->get();
        $parent_questions = [];
        $answers = [];
        foreach ($sessions as $session){
            $question_id = $session["question_id"];
            $question = Question::find($question_id);
            $parent_question = Question::find($question->parent_id);
            $answers[$question_id] = $session["answer"];
            if(!in_array($parent_question->id,$parent_questions))
                $parent_questions[] = $parent_question->id;
        }

        $question_list = json_decode($sessions[0]['question_list'],1);
        foreach ($question_list as $parent_question){

            $question = Question::where("parent_id",null)->find($parent_question);
            $fetch_sub_questions = Question::where("parent_id",$question->id)->get();
            $sub_questions = [];
            foreach ($fetch_sub_questions as $fetch_sub_question){
                $fetch_sub_question->user_answer = isset($answers[$fetch_sub_question->id])?$answers[$fetch_sub_question->id]:null;
                $sub_questions[] = $fetch_sub_question;
            }
            $question->sub_questions = $sub_questions;
            $return[] = $question;

        }







        if(count($return))
            $status = 'successful';
        else
            $status = 'error';
        return response()->json(['status'=>$status,'results'=>$return],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    protected function asDateTime($value)
    {
        return Carbon::parse($value)->timestamp;
    }


}
