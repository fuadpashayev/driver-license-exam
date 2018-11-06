@extends('layouts.app')

@section('content')
    <div class="container">
       <p>{{$parent_question->text}}</p>

        @foreach($child_questions as $child_question)
            <p>{{$child_question->text}} - {{$child_question->answerg}}</p>
        @endforeach
    </div>
@endsection
