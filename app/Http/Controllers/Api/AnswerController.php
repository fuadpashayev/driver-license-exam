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
        $device_id = $request['device_id'];
        $answers = json_decode($request['answers'],1);
        $return = [];

        foreach ($answers as $question_id => $answer){
            $question_id = (int) $question_id;
            $check = Session::where(["question_id"=>$question_id,"session_id"=>$session_id,"device_id"=>$device_id])->get()->count();
            if($check==0) {
                $question = Question::find($question_id);
                $real_answer = $question->answer;
                $session = new Session;
                $session->session_id = $session_id;
                $session->question_id = $question_id;
                $session->device_id = $device_id;
                $session->answer = $answer;
                $session->real_answer = $real_answer;
                $session->save();
                $return[$question_id] = $answer == $real_answer;
            }
        }

        return response()->json(['results'=>$return],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function statistics(Request $request){
        $device_id = $request->device_id;
        $return = [];
        $sessions = Session::where("device_id",$device_id)->groupBy("session_id")->get();
        foreach ($sessions as $session){
            $results = Session::where("session_id",$session["session_id"])->get();
            $returnSession = [];
            foreach ($results as $result){
                $returnSession[] = ["session_id"=>$result["session_id"],"answer"=>$result["answer"],"correct_answer"=>$result["real_answer"],"time"=>$result["created_at"],"timestamp"=>$this->asDateTime($result["created_at"])];
            }
            $return[$session["session_id"]] = $returnSession;
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
