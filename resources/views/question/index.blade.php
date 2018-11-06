@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($questions as $question)
            <div><a href="{{route('question.show',$question->id)}}">{{$question->text}}</a></div>
        @endforeach

    </div>
@endsection
