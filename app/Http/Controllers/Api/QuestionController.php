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

        $question_list = [];
        if(count($questions)){
            $status = "success";
            if($type=='with_sub_questions'){
                $returnQuestions = [];
                foreach ($questions as $question){
                    $sub_questions = Question::where("parent_id",$question->id)->get();
                    $question->sub_questions = $sub_questions;
                    $returnQuestions[] = $question;
                    $question_list[] = $question->id;
                }
            }else $returnQuestions = $questions;
        }else{
            $status = "error";
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$returnQuestions,'question_list'=>$question_list],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }


    public static function show($id,$self=false)
    {
        $question = Question::where("parent_id",null)->find($id);
        if($question){
            $status = "success";
            $sub_questions = Question::where("parent_id",$question->id)->get();
            $question->sub_questions = $sub_questions;
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
        $question_list = [];
        if(count($questions)){
            $status = "success";
            $returnQuestions = [];
            foreach ($questions as $question){
                $sub_questions = Question::where("parent_id",$question->id)->get();
                $question->sub_questions = $sub_questions;
                $returnQuestions[] = $question;
                $question_list[] = $question->id;
            }
        }else{
            $status = "error";
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$returnQuestions,'question_list'=>$question_list],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

    }


    public function categoryAll(){
        $categories = Category::all();
        if(count($categories))
            $status = "success";
        else{
            $status = "error";
            $categories = null;
        }
        return response()->json(['status'=>$status,'categories'=>$categories],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function questionsFromCategory($id,$all=25){

        $questions = Question::where('category_id',$id);
        if($all=='random')
            $questions = $questions->limit(25)->where("parent_id",null)->inRandomOrder();
        $questions = $questions->get();
        $question_list = [];
        if(count($questions)){
            $status = "success";
            $returnQuestions = [];
            foreach ($questions as $question){
                $sub_questions = Question::where("parent_id",$question->id)->get();
                $question->sub_questions = $sub_questions;
                $returnQuestions[] = $question;
                $question_list[] = $question->id;
            }
        }else{
            $status = "error";
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$returnQuestions,'question_list'=>$question_list],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

    }

    public function questionsFromCategories(Request $request){
        $categories = $request->categories;
        $categories = preg_replace('/[\[\]]/i','',$categories);
        $categories = explode(',',$categories);
        $questions = Question::whereIn('category_id',$categories)->where("parent_id",null)->inRandomOrder()->limit(25)->get();
        $question_list = [];
        if(count($questions)){
            $status = "success";
            $returnQuestions = [];
            foreach ($questions as $question){
                $sub_questions = Question::where("parent_id",$question->id)->get();
                $question->sub_questions = $sub_questions;
                $returnQuestions[] = $question;
                $question_list[] = $question->id;
            }
        }else{
            $status = "error";
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$returnQuestions,'question_list'=>$question_list],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

    }

    public static function sub_questions($question_id,$self=false){
        $sub_questions = Question::where("parent_id",$question_id)->get();
        if(count($sub_questions))
            $status = "success";
        else{
            $status = "error";
            $questions = null;
        }
        if(!$self)
            return response()->json(['status'=>$status,'sub_questions'=>$sub_questions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        else
            return $sub_questions;

    }


}
