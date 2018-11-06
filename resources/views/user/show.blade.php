@extends('layouts.app')

@section('content')
    <div class="container">
       <p>{{$question->description}}</p>

        @foreach($question->answers as $answer)
            <p style="color:{{$answer->id==$question->right_answer_id?'red':null}}">{{$answer->description}}</p>
        @endforeach
    </div>
@endsection
