@extends('layouts.app')

@section('title')
    <title>Add Question</title>
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($errors->all() as $message) {
        {{$message}}
        @endforeach
        <form method="post" action="{{route('question.store')}}" class="slide">
            @csrf
            <div class="input-box-group">
                <div class="input-group-header">Main Question</div>
                <div class="input-box">
                    <span class="input-addon">
                        <i class="material-icons">subtitles</i>
                    </span>
                    <input id="main-question" name="text" required="" placeholder="Question">
                </div>

                <div class="input-box">
                    <span class="input-addon">
                        <i class="material-icons">image</i>
                    </span>
                    <input name="image[]" type="file" id="image" class="hidden">
                    <div class="file-input image-input" for="image">Upload</div>
                    <div class="preview"><a class="image" href=""><img src="" title=""></a></div>
                </div>

                <div class="input-box">
                    <span class="input-addon">
                        <i class="material-icons">audiotrack</i>
                    </span>
                    <input name="audio[]" type="file" id="audio_0" class="hidden">
                    <div class="file-input audio-input" for="audio_0">Upload</div>
                    <div class="preview">
                        <audio controls style="display: none;">
                            <source src="" type="audio/mpeg"/>
                        </audio>
                        <div class="audio-toggle material-icons relative">play_circle_filled</div>
                    </div>
                </div>
            </div>

            <div class="input-group-header"><span class="btn btn-success btn-iconed" id="add-question"><i class="material-icons">add</i> Add Question</span></div>

            <div class="questions-group">

            </div>

            <div class="input-box submit">
                <button class="btn btn-success btn-iconed"><i class="material-icons">edit</i> Save</button>
            </div>


        </form>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('general/css/question.css')}}"/>
    <style>
        #spot-break{display: none;}
    </style>
@endsection

@section('js')
    <script src="{{asset('general/js/question.js')}}"></script>
@endsection


