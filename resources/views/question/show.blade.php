@extends('layouts.app')

@section('title')
    <title>{{$parent_question->text}}</title>
@endsection

@section('content')
    <div class="container">
       <p>{{$parent_question->text}}</p>

        @foreach($child_questions as $child_question)
            <p>{{$child_question->text}} - {{$child_question->answer}}</p>
        @endforeach
    </div>
@endsection
