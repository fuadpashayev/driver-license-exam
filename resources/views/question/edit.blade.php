@extends('layouts.app')

@section('title')
    <title>Edit - {{$parent_question->text}}</title>
@endsection

@section('content')
    <div class="container">
        @foreach ($errors->all() as $message) {
        {{$message}}
        @endforeach
        <form method="post" action="{{route('question.update',['id'=>$parent_question->id])}}" class="slide" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="input-box-group">
                <div class="input-group-header">Main Question</div>
                <div class="input-box">
                    <span class="input-addon">
                        <i class="material-icons">subtitles</i>
                    </span>
                    <input id="main-question" name="text[{{$parent_question->id}}]" required="" placeholder="Question" value="{{$parent_question->text}}">
                </div>

                <div class="input-box">
                    <span class="input-addon">
                        <i class="material-icons">image</i>
                    </span>
                    <input name="image[]" type="file" id="image" class="hidden" role="image">
                    <div class="file-input image-input content-added" for="image">Upload</div>
                    <div class="preview flex"><a class="image" href="{{$parent_question->image_url}}"><img src="{{$parent_question->image_url}}" title="{{$parent_question->text}}"></a></div>
                </div>

                <div class="input-box">
                    <span class="input-addon">
                        <i class="material-icons">audiotrack</i>
                    </span>
                    <input name="audio[{{$parent_question->id}}]" type="file" id="audio_0" class="hidden" role="audio">
                    <div class="file-input audio-input content-added" for="audio_0">Upload</div>
                    <div class="preview flex">
                        <audio controls style="display: none;" src="{{$parent_question->audio_url}}">
                            <source src="{{$parent_question->audio_url}}" type="audio/mpeg"/>
                        </audio>
                        <div class="audio-toggle material-icons relative">play_circle_filled</div>
                    </div>
                </div>

                <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">dns</i>
                </span>
                    <div class="dropdown-select">
                        <div class="select">
                            <?php
                                $category_name = \App\Category::find($parent_question->category_id);
                            ?>
                            <span>{{$category_name->name}}</span>
                            <i class="fa fa-chevron-left"></i>
                        </div>
                        <input type="hidden" name="category" value="{{$parent_question->category_id}}">
                        <ul class="dropdown-menu-select">
                            @foreach($categories as $category)
                                <li id="{{$category->id}}">{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="input-group-header"><span class="btn btn-success btn-iconed" id="add-question"><i class="material-icons">add</i> Add Question</span></div>

            <div class="questions-group">
                @foreach($child_questions as $id => $child_question)
                    <div class="input-box-group" id="{{$child_question->id}}">
                        <div class="input-group-header">Question {{$id+1}} <span class="delete-question material-icons" role="delete" route="{{route("question.destroy",['id'=>$child_question->id])}}">close</span></div>
                        <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">subtitles</i>
                </span>
                            <input name="text[{{$child_question->id}}]" required="" placeholder="Question" value="{{$child_question->text}}">
                        </div>
                        <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">check</i>
                </span>
                            <div class="dropdown-select">
                                <div class="select">
                                    <span>{{$child_question->answer==1?"Right":"Wrong"}}</span>
                                    <i class="fa fa-chevron-left"></i>
                                </div>
                                <input type="hidden" name="answer[{{$child_question->id}}]" value="{{$child_question->answer}}">
                                <ul class="dropdown-menu-select">
                                    <li id="1">Right</li>
                                    <li id="0">Wrong</li>
                                </ul>
                            </div>
                        </div>
                        <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">audiotrack</i>
                </span>
                            <input name="audio[{{$child_question->id}}]" type="file" id="audio_{{$id}}" class="hidden">
                            <div class="file-input audio-input content-added" for="audio_{{$id}}">Upload</div>
                            <div class="preview flex">
                                <audio controls style="display: none;" src="{{$child_question->audio_url}}">
                                    <source  src="{{$child_question->audio_url}}" type="audio/mpeg"/>
                                </audio>
                                <div class="audio-toggle material-icons relative">play_circle_filled</div>
                            </div>
                        </div>

                    </div>
                @endforeach
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


