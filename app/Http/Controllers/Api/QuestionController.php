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
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$returnQuestions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }


    public static function show($id,$self=false)
    {
        $question = Question::where("parent_id",null)->find($id);
        $question->image_url = site_url().$question->image_url;
        $question->audio_url = site_url().$question->audio_url;
        if($question){
            $status = "success";
            $sub_questions = Question::where("parent_id",$question->id)->get();
            $returnSubQuestions = [];
            foreach ($sub_questions as $sub_question){
                $sub_question->audio_url = site_url().$sub_question->audio_url;
                $returnSubQuestions[] = $sub_question;
            }
            $question->sub_questions = $returnSubQuestions;
        }else{
            $status = "error";
            $question = null;
        }
        if(!$self)
            return response()->json(['status'=>$status,'question'=>$question],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        else
            return $question;
    }

    public function random_with_sub_questions(){
        $questions = Question::where("parent_id",null)->inRandomOrder()->limit(25)->get();

        if(count($questions)){
            $status = "success";
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
        }else{
            $status = "error";
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$returnQuestions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

    }


    public function categoryAll(){
        $categories = Category::all();
        $returnCategories = [];
        foreach ($categories as $category){
            $category->image_url = site_url().$category->image_url;
            $returnCategories[] = $category;
        }
        if(count($returnCategories))
            $status = "success";
        else{
            $status = "error";
            $categories = null;
        }
        return response()->json(['status'=>$status,'categories'=>$returnCategories],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function questionsFromCategory($id,$all=25){

        $questions = Question::where('category_id',$id);
        $questions = $questions->limit(25)->where("parent_id",null);
        $questions = $questions->get();
        if(count($questions)){
            $status = "success";
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
        }else{
            $status = "error";
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$returnQuestions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

    }

    public function questionsFromCategories(Request $request){
        $categories = $request->categories;
        $categories = preg_replace('/[\[\]]/i','',$categories);
        $categories = explode(',',$categories);
        $questions = Question::whereIn('category_id',$categories)->where("parent_id",null)->inRandomOrder()->limit(25)->get();
        if(count($questions)){
            $status = "success";
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
        }else{
            $status = "error";
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$returnQuestions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

    }

    public static function sub_questions($question_id,$self=false){
        $sub_questions = Question::where("parent_id",$question_id)->get();
        $returnSubQuestions = [];
        foreach ($sub_questions as $sub_question){
            $sub_question->audio_url = site_url().$sub_question->audio_url;
            $returnSubQuestions[] = $sub_question;
        }

        if(count($returnSubQuestions))
            $status = "success";
        else{
            $status = "error";
            $questions = null;
        }
        if(!$self)
            return response()->json(['status'=>$status,'sub_questions'=>$returnSubQuestions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        else
            return $sub_questions;

    }


}
