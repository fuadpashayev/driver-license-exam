@extends('layouts.app')

@section('title')
    <title>Settings - Edit</title>
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($errors->all() as $message) {
            {{$message}}
        @endforeach
        <form method="post" action="{{route('setting.update',['id'=>1])}}" class="slide">
            @csrf
            @method('put')
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">person</i>
                </span>
                <input name="title" required="" placeholder="Title" value="{{$settings->title}}">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">alternate_email</i>
                </span>
                <input name="url" required="" placeholder="URL" value="{{$settings->url}}">
            </div>


            <div class="input-box submit">
               <button class="btn btn-success btn-iconed"><i class="material-icons">save</i> Save</button>
            </div>


        </form>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('general/css/settings.css')}}"/>
    <style>
        #spot-break{display: none;}
    </style>
@endsection

@section('js')
    <script src="{{asset('general/js/settings.js')}}"></script>
@endsection


