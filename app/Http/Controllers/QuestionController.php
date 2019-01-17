<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::where("parent_id",null)->get();

        return view('question.index',['questions'=>$questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id=null)
    {
        $categories = Category::all();
        $category = null;
        if($category_id)
            $category = Category::find($category_id);
        return view('question.create',['categories'=>$categories,'category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => ['required', 'array'],
            'image' => ['required', 'array'],
            'image.*' => ['required', 'image'],
            'audio' => ['required', 'array'],
            'audio.*' => ['required','mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'],
            'answer' => ['required', 'array'],
            'category' => ['required', 'string']
        ]);
        $category_id = $request->category;
        $user_id = $request->user()->id;
        $parent_question = new Question;
        $parent_question->category_id = $category_id;
        $parent_question->text = $request->text[0];
        $parent_question->image_url = '/storage/'.$request->file('image')[0]->store('image');
        $parent_question->audio_url = '/storage/'.$request->file('audio')[0]->store('audio');
        $parent_question->user_id = $user_id;
        $parent_question->save();

        for($i=1;$i<count($request->text);$i++){
                $child_question = new Question;
                $child_question->category_id = $category_id;
                $child_question->text = $request->text["n$i"];
                $child_question->answer = $request->answer["n$i"];
                $child_question->audio_url = '/storage/'.$request->file('audio')["n$i"]->store('audio');
                $child_question->user_id = $user_id;
                $child_question->parent_id = $parent_question->id;
                $child_question->save();
        }


        return redirect()->route('question.show',['id'=>$parent_question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parent_question = Question::findOrFail($id);
        $child_questions = Question::where("parent_id",$id)->get();

        return view('question.show',['parent_question'=>$parent_question,'child_questions'=>$child_questions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parent_question = Question::find($id);
        $child_questions = Question::where("parent_id",$parent_question->id)->get();
        $categories = Category::all();
        if($parent_question)
            return view('question.edit',['parent_question'=>$parent_question,'child_questions'=>$child_questions,'categories'=>$categories]);
        else
            return redirect()->route('question.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'text' => ['required', 'array'],
            'image' => ['nullable', 'array'],
            'image.*' => ['nullable', 'image'],
            'audio' => ['nullable', 'array'],
            'audio.*' => ['nullable','mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'],
            'answer' => ['required', 'array'],
            'category' => ['required', 'string']
        ]);
        $category_id = $request->category;
        $texts = $request->text;
        $audios = $request->file("audio");
        $user_id = $request->user()->id;
        $parent_question = Question::find($id);
        $parent_question->category_id = $category_id;
        $parent_question->text = $texts[$parent_question->id];
        unset($texts[$parent_question->id]);
        if(isset($request->image[0]))
            $parent_question->image_url = '/storage/'.$request->file('image')[0]->store('image');
        if(isset($request->audio[$parent_question->id])){
            $parent_question->audio_url = '/storage/'.$audios[$parent_question->id]->store('audio');
            unset($audios[$parent_question->id]);
        }
//        dd($request->file('image')[0]);
        $parent_question->user_id = $user_id;
        $parent_question->save();
        foreach($texts as $index => $questionn){
            $check = Question::find($index);
            if($check){
                $child_question = $check;
            }else {
                $child_question = new Question;
            }

            //dd($check);
            $child_question->category_id = $category_id;
            $child_question->text = $request->text[$index];
            $child_question->answer = isset($request->answer[$index])?$request->answer[$index]:null;
            if(isset($request->file('audio')[$index]))
                $child_question->audio_url = '/storage/'.$audios[$index]->store('audio');
            $child_question->user_id = $user_id;
            $child_question->parent_id = $parent_question->id;
            $child_question->save();
        }


        return redirect()->route('question.show',['id'=>$parent_question->id]);
    }


    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        if($question)
            echo 'ok';
        else
            echo'no';
    }
}
