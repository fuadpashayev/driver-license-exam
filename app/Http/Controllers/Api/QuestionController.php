<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index($type='all')
    {
        if($type=='all')
            $questions = Question::where("parent_id",null)->get();
        elseif($type=='random')
            $questions = Question::where("parent_id",null)->inRandomOrder()->limit(25)->get();

        if(count($questions)){
            $status = "success";
            $returnQuestions = [];
            foreach ($questions as $question){
                $sub_questions = Question::where("parent_id",$question->id)->get();
                $question->sub_questions = $sub_questions;
                $returnQuestions[] = $question;
            }
        }else{
            $status = "error";
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$returnQuestions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }


    public function show($id)
    {
        $question = Question::find($id);
        if($question){
            $status = "success";
            $sub_questions = Question::where("parent_id",$question->id)->get();
            $question->sub_questions = $sub_questions;
        }else{
            $status = "error";
            $question = null;
        }
        return response()->json(['status'=>$status,'question'=>$question],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);;
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
            $questions = $questions->limit(25)->inRandomOrder();
        $questions = $questions->get();
        if(count($questions))
            $status = "success";
        else{
            $status = "error";
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$questions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);;

    }

    public function questionsFromCategories(Request $request){
        $categories = $request->categories;
        $categories = json_decode($categories,1)["list"];
        $questions = Question::whereIn('category_id',$categories)->inRandomOrder()->limit(25)->get();
        if(count($questions))
            $status = "success";
        else{
            $status = "error";
            $questions = null;
        }
        return response()->json(['status'=>$status,'questions'=>$questions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);;;

    }


}
