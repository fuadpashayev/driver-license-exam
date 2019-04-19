<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Null_;

class QuestionController extends Controller
{
    static $sub_questions;
    public function index($type='all'){
        if($type=='all' || $type=='with_sub_questions')
            $questions = Question::where("parent_id",null)->get();
        elseif($type=='random')
            $questions = Question::where("parent_id",null)->inRandomOrder()->limit(25)->get();

        if(count($questions)){
            $status = "success";
            $message = "Questions fetched successfully";
            $status_code = 200;
            if($type=='with_sub_questions'){
                $returnQuestions = [];
                foreach ($questions as $question){
                    $question->image_url = site_url().$question->image_url;
                    $question->audio_url = site_url().$question->audio_url;
                    $sub_questions = Question::where("parent_id",$question->id)->get();
                    $returnSubQuestions = [];
                    foreach ($sub_questions as $sub_question){
                        $sub_question->audio_url = site_url().$sub_question->audio_url;
                        $returnSubQuestions[] = $sub_question;
                    }
                    $question->sub_questions = $returnSubQuestions;
                    $returnQuestions[] = $question;
                }
            }else $returnQuestions = $questions;
        }else{
            $status = "error";
            $message = "No question found";
            $status_code = 404;
            $questions = null;
        }
        return response()->json(['status'=>$status,'message'=>$message,'questions'=>$returnQuestions],$status_code,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }


    public static function show($id,$self=false)
    {
        $question = Question::where("parent_id",null)->find($id);
        if(@$question->image_url){
            $question->image_url = site_url().$question->image_url;
            $question->audio_url = site_url().$question->audio_url;
            $returnSubQuestions = [];
            if($question){
                $status = "success";
                $message = "Question fetched successfully";
                $status_code = 200;
                $sub_questions = Question::where("parent_id",$question->id)->get();
                foreach ($sub_questions as $sub_question){
                    $sub_question->audio_url = site_url().$sub_question->audio_url;
                    $returnSubQuestions[] = $sub_question;
                }
                $question->sub_questions = $returnSubQuestions;
            }else{
                $status = "error";
                $message = "Question not found";
                $status_code = 404;
                $question = null;
            }
        }else{
            $status = "error";
            $message = "Question not found";
            $status_code = 404;
            $question = null;
        }

        if(!$self)
            return response()->json(['status'=>$status,'message'=>$message,'question'=>$question],$status_code,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        else
            return $question;
    }

    public function random_with_sub_questions(){
        $questions = Question::where("parent_id",null)->inRandomOrder()->limit(25)->get();

        $returnQuestions = [];
        if(count($questions)){
            $status = "success";
            $message = "Questions fetched successfully";
            $status_code = 200;
            foreach ($questions as $question){
                $question->image_url = site_url().$question->image_url;
                $question->audio_url = site_url().$question->audio_url;
                $sub_questions = Question::where("parent_id",$question->id)->get();
                $returnSubQuestions = [];
                foreach ($sub_questions as $sub_question){
                    $sub_question->audio_url = site_url().$sub_question->audio_url;
                    $returnSubQuestions[] = $sub_question;
                }
                $question->sub_questions = $returnSubQuestions;
                $returnQuestions[] = $question;
            }
        }else{
            $status = "error";
            $message = "No question found";
            $status_code = 404;
            $questions = null;
        }
        return response()->json(['status'=>$status,'message'=>$message,'questions'=>$returnQuestions],$status_code,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

    }


    public function categoryAll(Request $request){
        $id = $request->id;
        $order = $request->order;
        if($id && $order){
            $questions = Question::where('category_id',$id);
            $questions = $questions->limit(25)->where("parent_id",null);
            $questions = $questions->get();
            $returnQuestions = [];
            if(count($questions)){
                $status = "success";
                $message = "Questions fetched successfully";
                $status_code = 200;
                foreach ($questions as $index => $question){
                    $question->image_url = site_url().$question->image_url;
                    $question->audio_url = site_url().$question->audio_url;
                    $sub_questions = Question::where("parent_id",$question->id)->get();
                    $returnSubQuestions = [];
                    foreach ($sub_questions as $sub_question){
                        $sub_question->audio_url = site_url().$sub_question->audio_url;
                        $returnSubQuestions[] = $sub_question;
                    }
                    $question->sub_questions = $returnSubQuestions;
                    $returnQuestions[] = $question;
                }

                if($order!=null) $returnQuestions = $returnQuestions[$order-1];

            }else{
                $status = "error";
                $message = "No question found";
                $status_code = 404;
                $questions = null;
            }
            return response()->json(['status'=>$status,'message'=>$message,'questions'=>$returnQuestions],$status_code,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

        }else {
            $categories = Category::all();
            $returnCategories = [];
            foreach ($categories as $category) {
                $category->image_url = site_url() . $category->image_url;
                $category->questions_count = Question::where(["category_id" => $category->id,"parent_id" => null])->count();
                $returnCategories[] = $category;
            }
            if (count($returnCategories)){
                $status = "success";
                $message = "Categories fetched successfully";
                $status_code = 200;
            }else {
                $status = "error";
                $message = "No category found";
                $status_code = 404;
                $categories = null;
            }
            return response()->json(['status'=>$status,'message'=>$message,'categories'=>$returnCategories], $status_code, ["Accept" => "application/json; charset=utf-8", "Content-type" => "application/json; charset=utf-8"], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function questionsFromCategory(Request $request){
        $id = $request->id;
        $order = $request->order;
        $questions = Question::where('category_id',$id);
        $questions = $questions->limit(25)->where("parent_id",null);
        $questions = $questions->get();
        $returnQuestions = [];
        if(count($questions)){
            $status = "success";
            $message = "Questions fetched successfully";
            $status_code = 200;
            foreach ($questions as $index => $question){
                $question->image_url = site_url().$question->image_url;
                $question->audio_url = site_url().$question->audio_url;
                $sub_questions = Question::where("parent_id",$question->id)->get();
                $returnSubQuestions = [];
                foreach ($sub_questions as $sub_question){
                    $sub_question->audio_url = site_url().$sub_question->audio_url;
                    $returnSubQuestions[] = $sub_question;
                }
                $question->sub_questions = $returnSubQuestions;
                $returnQuestions[] = $question;
            }

            if($order!=null) $returnQuestions = $returnQuestions[$order-1];

        }else{
            $status = "error";
            $message = "No question found";
            $status_code = 404;
            $questions = null;
        }
        return response()->json(['status'=>$status,'message'=>$message,'questions'=>$returnQuestions],$status_code,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

    }

    public function questionsFromCategories(Request $request){
        $categories = $request->categories;
        $categories = preg_replace('/[\[\]]/i','',$categories);
        $categories = explode(',',$categories);
        $questions = Question::whereIn('category_id',$categories)->where("parent_id",null)->inRandomOrder()->limit(25)->get();
        $returnQuestions = [];
        if(count($questions)){
            $status = "success";
            $message = "Questions fetched successfully";
            $status_code = 200;
            foreach ($questions as $question){
                $question->image_url = site_url().$question->image_url;
                $question->audio_url = site_url().$question->audio_url;
                $sub_questions = Question::where("parent_id",$question->id)->get();
                $returnSubQuestions = [];
                foreach ($sub_questions as $sub_question){
                    $sub_question->audio_url = site_url().$sub_question->audio_url;
                    $returnSubQuestions[] = $sub_question;
                }
                $question->sub_questions = $returnSubQuestions;
                $returnQuestions[] = $question;
            }
        }else{
            $status = "error";
            $message = "No question found";
            $status_code = 404;
            $questions = null;
        }
        return response()->json(['status'=>$status,'message'=>$message,'questions'=>$returnQuestions],$status_code,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

    }

    public static function sub_questions($question_id,$self=false){
        $sub_questions = Question::where("parent_id",$question_id)->get();
        $returnSubQuestions = [];
        foreach ($sub_questions as $sub_question){
            $sub_question->audio_url = site_url().$sub_question->audio_url;
            $returnSubQuestions[] = $sub_question;
        }

        if(count($returnSubQuestions)) {
            $status = "success";
            $message = "Sub questions fetched successfully";
            $status_code = 200;
        }else{
            $status = "error";
            $message = "No sub question found";
            $status_code = 404;
            $questions = null;
        }
        if(!$self)
            return response()->json(['status'=>$status,'message'=>$message,'sub_questions'=>$returnSubQuestions],$status_code,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        else
            return $sub_questions;

    }


}
