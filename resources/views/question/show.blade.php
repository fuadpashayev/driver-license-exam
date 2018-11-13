@extends('layouts.app')

@section('title')
    <title>{{$parent_question->text}}</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="field-outer">

            <div class="image-outer">
                <a class="image" href="{{$parent_question->image_url}}"><img title="{{$parent_question->text}}" src="{{$parent_question->image_url}}" alt=""></a>
                <span class="caption">{{$parent_question->text}}</span>
            </div>

            <table class="data" id="question" border="1">
                <thead>
                <tr>
                    <td>Question</td>
                    <td>Answer</td>
                    <td>Audio</td>
                    <td>Options</td>
                </tr>
                </thead>
                <tbody>
                @foreach($child_questions as $child_question)
                    <tr id="{{$child_question->id}}">
                        <td>{{$child_question->text}}</td>
                        <td>{{$child_question->answer?'Right':'Wrong'}}</td>
                        <td class="center">
                            <audio controls style="display: none;">
                                <source src="{{$child_question->audio_url}}" type="audio/mpeg"/>
                            </audio>
                            <div class="audio-toggle material-icons">play_circle_filled</div>
                        </td>
                        <td>
                            <a href="{{route('question.edit',$child_question->id)}}"><button class="btn btn-primary edit" role="edit"><i class="material-icons" data-target="#deleteModal">edit</i> Edit</button></a>
                            <a href="" onclick="return false;"><button class="btn btn-danger delete" route="{{route('question.destroy',['id'=>$child_question->id])}}" role="delete" data-target="#deleteModal"><i class="material-icons">delete</i> Delete</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
