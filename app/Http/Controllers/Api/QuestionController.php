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
            $questions = Question::all();
        elseif($type=='random')
            $questions = Question::inRandomOrder()->limit(25)->get();
        return ['questions'=>$questions];
    }


    public function show($id)
    {
        $question = Question::find($id);
        return [$id=>$question];
    }


    public function categoryAll(){
        $categories = Category::all();
        return ['categories'=>$categories];
    }

    public function questionsFromCategory($id,$all=25){

        $questions = Question::where('category_id',$id)->inRandomOrder();
        if($all!='all')
            $questions = $questions->limit(25);
        $questions = $questions->get();
        return ['questions'=>$questions];

    }

    public function questionsFromCategories(Request $request){

        $categories = json_decode($request->categories,1)['list'];
        $questions = Question::whereIn('category_id',$categories)->inRandomOrder()->limit(25)->get();
        return $questions;

    }


}
