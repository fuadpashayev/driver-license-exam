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
            <div class="inp-header">Categories</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header">URL</div>
                <input role="url" value="{{route("api.categories.all")}}"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <div class="result"></div>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Questions from specific category</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header">URL</div>
                <input role="url" value="{{route("api.category.questions",['id'=>1])}}"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <div class="result"></div>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">25 random questions from specific category</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header">URL</div>
                <input role="url" value="{{route("api.category.questions.random",['id'=>1,'random'=>'random'])}}"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <div class="result"></div>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">25 random questions from several categories</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header">URL</div>
                <input role="url" value="{{route("api.categories.questions")}}"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header simple" contenteditable="true" placeholder="categories" role="key">categories</div>
                <input role="value" value='{"list":[1,3,5]}'/>
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



