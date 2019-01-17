@extends('layouts.app')
@section('title')
    <title>Questions</title>
@endsection
@section('content')
    <div class="container-fluid">
        <table class="data" id="question" border="1">
            <thead>
            <tr>
                <td>Image</td>
                <td>Question</td>
                <td>Category</td>
                <td>Sub Questions</td>
                <td>Options</td>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
                @php
                    $child_questions = \App\Question::where("parent_id",$question->id)->count();
                    $categoryName = \App\Category::find($question->category_id)->name;
                @endphp
                <tr id="{{$question->id}}">
                    <td><a class="image" href="{{asset($question->image_url)}}"><img title="{{$question->text}}" src="{{asset($question->image_url)}}"/></a></td>
                    <td>{{$question->text}}</td>
                    <td>{{$categoryName}}</td>
                    <td>{{$child_questions}}</td>
                    <td><a href="{{route('question.show',$question->id)}}"><button class="btn btn-secondary view"><i class="material-icons">remove_red_eye</i> View</button></a> <a href="{{route('question.edit',$question->id)}}"><button class="btn btn-primary edit"><i class="material-icons">edit</i> Edit</button></a> <a href="#"><button class="btn btn-danger delete" data-target="#deleteModal" role="delete" route="{{route('question.destroy',['id'=>$question->id])}}"><i class="material-icons">delete</i> Delete</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="{{asset('general/js/question.js')}}"></script>
@endsection




