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
        return response()->json(['questions'=>$questions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }


    public function show($id)
    {
        $question = Question::find($id);
        return response()->json([$id=>$question],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);;
    }


    public function categoryAll(){
        $categories = Category::all();
        return response()->json(['categories'=>$categories],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function questionsFromCategory($id,$all=25){

        $questions = Question::where('category_id',$id);
        if($all=='random')
            $questions = $questions->limit(25)->inRandomOrder();
        $questions = $questions->get();
        return response()->json(['questions'=>$questions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);;

    }

    public function questionsFromCategories(Request $request){
        $categories = $request->categories;
        $categories = json_decode($categories,1)["list"];
        $questions = Question::whereIn('category_id',$categories)->inRandomOrder()->limit(25)->get();
        return response()->json(['questions'=>$questions],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);;;

    }


}
