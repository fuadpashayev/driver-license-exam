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
                    <i class="material-icons">subtitles</i>
                </span>
                <input name="title" required="" placeholder="Title" value="{{$settings->title}}">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">link</i>
                </span>
                <input name="url" required="" placeholder="URL" value="{{$settings->url}}">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">aspect_ratio</i>
                </span>
                <div class="input-next">
                    <div class="onoffswitch">
                        <input type="checkbox" name="app_tariff_type" class="onoffswitch-checkbox" id="myonoffswitch" {{$settings->app_tariff_type?'checked="checked"':null}}>
                        <label class="onoffswitch-label" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
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


