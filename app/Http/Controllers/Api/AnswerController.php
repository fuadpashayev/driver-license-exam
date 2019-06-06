<?php

namespace App\Http\Controllers\API;


use App\Question;
use App\Session;
use App\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function answer(Request $request){
        $session_id = $request['session_id'];
        $user_id =  $request['user_id'];
        $device_id = $request['device_id'];
        $answers = json_decode($request['answers'],1);
        $question_list = $request['question_list'];
        $return = [];
        foreach ($answers as $question_id => $answer){
            $check = Session::where(["question_id"=>$question_id,"session_id"=>$session_id]);
            if($user_id)
                $check = $check->where("user_id",$user_id);
            else
                $check = $check->where("device_id",$device_id);
            $check = $check->get()->count();
            if($check==0) {
                $question = Question::find($question_id);
                dd($question->answer);
                //return $real_answer;
                @$real_answer = $question->answer;
                if($real_answer!=null && !empty($real_answer) && $real_answer!=""){
                    $session = new Session;
                    $session->session_id = $session_id;
                    $session->question_id = $question_id;
                    $session->user_id = $user_id;
                    $session->device_id = $device_id;
                    $session->answer = $answer;
                    $session->real_answer = $real_answer;
                    $session->question_list = $question_list;
                    $session->save();
                    $return[$question_id] = $answer == $real_answer;
                    $status = 'success';
                    $status_code = 200;
                    $message = 'Answers are sended to database successfully';
                }else{
                    $status = 'error';
                    $status_code = 404;
                    $message = 'Some questions do not exist on database';
                }
            }else{
                $status = 'error';
                $status_code = 404;
                $message = 'These answers exist on database';
            }
        }

        return response()->json(['status'=>$status,'message'=>$message,'results'=>$return],$status_code,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function statistics(Request $request){
        $user_id = $request->user_id;
        $device_id = $request->device_id;
        $return = [];
        if($user_id)
            $sessions = Session::where("user_id",$user_id);
        else
            $sessions = Session::where("device_id",$device_id);

        $sessions = $sessions->groupBy("session_id")->get();
        foreach ($sessions as $session){
            $results = Session::where("session_id",$session["session_id"])->get();
            $returnSession = [];
            foreach ($results as $result){
                $returnSession[] = ["question_id"=>$result["question_id"],"session_id"=>$result["session_id"],"answer"=>$result["answer"],"correct_answer"=>$result["real_answer"],"time"=>$result["created_at"],"timestamp"=>$this->asDateTime($result["created_at"])];
            }
            $return[$session["session_id"]] = $returnSession;
        }
        if(count($return)) {
            $status = 'successful';
            $message = 'Statistics fetched successfully';
            $status_code = 200;
        }else {
            $status = 'error';
            $message = 'No statistics data found';
            $status_code = 404;
        }
        return response()->json(['status'=>$status,'message'=>$message,'results'=>$return],$status_code,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function session_statistics(Request $request){
        $user_id = $request->user_id;
        $device_id = $request->device_id;
        $session_id = $request->session_id;
        $return = [];
        $sessions = Session::where("session_id",$session_id);
        if($user_id)
            $sessions->where("user_id",$user_id);
        else
            $sessions->where("device_id",$device_id);
        $sessions = $sessions->get();
        $answers = [];
        foreach ($sessions as $session){
            $question_id = $session["question_id"];
            $answers[$question_id] = $session["answer"];
        }
        if(isset($sessions[0])) {
            $question_list = json_decode($sessions[0]['question_list'], 1);
            foreach ($question_list as $parent_question) {

                $question = Question::find($parent_question);
                if(@$question->image_url){
                    $question->image_url = site_url().$question->image_url;
                    $question->audio_url = site_url().$question->audio_url;
                    $fetch_sub_questions = Question::where("parent_id", $question->id)->get();
                    $sub_questions = [];
                    foreach ($fetch_sub_questions as $fetch_sub_question) {
                        @$answer = $answers[$fetch_sub_question->id];
                        $fetch_sub_question->user_answer = $answer;
                        $fetch_sub_question->audio_url = site_url().$fetch_sub_question->audio_url;
                        $sub_questions[] = $fetch_sub_question;
                    }
                    $question->sub_questions = $sub_questions;
                    $return[] = $question;
                }else{
                    $return = [];
                }


            }
        }else{
            $return = [];
        }

        if(count($return)) {
            $status = 'successful';
            $message = 'Statistics data fetched successfully';
            $status_code = 200;
        }else {
            $status = 'error';
            $message = 'No statistics data found';
            $status_code = 404;
        }
        return response()->json(['status'=>$status,'message'=>$message,'results'=>$return],$status_code,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function app_tariff_type(){
       $settings = Settings::find(1);
       $app_tariff_type = $settings->app_tariff_type;

        return response()->json(['status'=>'success','app_tariff_type'=>$app_tariff_type],200,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }


    protected function asDateTime($value)
    {
        return Carbon::parse($value)->timestamp;
    }


}
