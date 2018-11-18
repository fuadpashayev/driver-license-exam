@extends('docs.app')
@section('title')
    <title>Documentation</title>
@endsection
@section('content')
@php 
$loading = '<div class="sk-fading-circle loading">
        <div class="sk-circle1 sk-circle"></div>
        <div class="sk-circle2 sk-circle"></div>
        <div class="sk-circle3 sk-circle"></div>
        <div class="sk-circle4 sk-circle"></div>
        <div class="sk-circle5 sk-circle"></div>
        <div class="sk-circle6 sk-circle"></div>
        <div class="sk-circle7 sk-circle"></div>
        <div class="sk-circle8 sk-circle"></div>
        <div class="sk-circle9 sk-circle"></div>
        <div class="sk-circle10 sk-circle"></div>
        <div class="sk-circle11 sk-circle"></div>
        <div class="sk-circle12 sk-circle"></div></div>';
@endphp
    <div class="container-fluid col-8">
        <div class="input-group spc-inp">
            <div class="inp-group no-filter">
                <div class="input-group-header">All questions</div>
                <input role="url" value="{{route("api.questions.all")}}"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <div class="result"></div>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-group no-filter">
                <div class="input-group-header">25 random questions</div>
                <input role="url" value="{{route("api.questions.random",['random'=>'random'])}}"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <div class="result"></div>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-group no-filter">
                <div class="input-group-header">1 specific question</div>
                <input role="url" value="{{route("api.question",['id'=>1])}}"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <div class="result"></div>
        </div>
    
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('general/css/docs.css')}}"/>
    <link rel="stylesheet" href="{{asset('general/css/loading.css')}}"/>
@endsection

@section('js')
    <script src="{{asset('general/js/docs.js')}}"></script>
@endsection



