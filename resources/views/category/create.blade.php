@extends('layouts.app')

@section('title')
    <title>Add Category</title>
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($errors->all() as $message) {
        {{$message}}
        @endforeach
        <form method="post" action="{{route('category.store')}}" class="slide" enctype="multipart/form-data">
            @csrf
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">subtitles</i>
                </span>
                <input name="name" required="" placeholder="Name">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">image</i>
                </span>
                <input name="image" type="file" id="image" class="hidden" role="image">
                <div class="file-input image-input" for="image">Upload</div>
                <div class="preview"><a class="image" href=""><img src="" title=""></a></div>
            </div>

            <div class="input-box submit">
                <button class="btn btn-success btn-iconed"><i class="material-icons">edit</i> Add Category</button>
            </div>


        </form>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('general/css/category.css')}}"/>
    <style>
        #spot-break{display: none;}
    </style>
@endsection

@section('js')
    <script src="{{asset('general/js/category.js')}}"></script>
@endsection


