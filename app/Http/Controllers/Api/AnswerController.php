<?php

namespace App\Http\Controllers\API;


use App\Question;
use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function answer(Request $request){
        $data = json_decode($request->data,1);
        $session_id = $data['session_id'];
        $answers = $data['answers'];
        $return = [];

        foreach ($answers as $question_id => $answer){
            $question_id = (int) $question_id;
            $check = Session::where("question_id",$question_id)->get();
            if(!$check) {
                $question = Question::find($question_id);
                $real_answer = $question->answer;
                $session = new Session;
                $session->session_id = $session_id;
                $session->question_id = $question_id;
                $session->answer = $answer;
                $session->real_answer = $real_answer;
                $session->save();
                $return[$question_id] = $answer == $real_answer;
            }
        }

        return response()->json(['results'=>$return],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }


}
