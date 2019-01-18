@extends('layouts.app')

@section('title')
    <title>{{$category->name}} - Edit</title>
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($errors->all() as $message) {
        {{$message}}
        @endforeach
        <form method="post" action="{{route('category.update',['id'=>$category->id])}}" class="slide" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">subtitles</i>
                </span>
                <input name="name" required="" placeholder="Name" value="{{$category->name}}">
            </div>

            <div class="input-box">
                    <span class="input-addon">
                        <i class="material-icons">image</i>
                    </span>
                <input name="image" type="file" id="image" class="hidden" role="image">
                <div class="file-input image-input content-added" for="image">Upload</div>
                <div class="preview flex"><a class="image" href="{{$category->image_url}}"><img src="{{$category->image_url}}" title="{{$category->name}}"></a></div>
            </div>

            <div class="input-box submit">
                <button class="btn btn-success btn-iconed"><i class="material-icons">save</i> Save</button>
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


