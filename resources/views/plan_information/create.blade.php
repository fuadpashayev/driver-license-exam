@extends('layouts.app')

@section('title')
    <title>Add Plan Information</title>
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($errors->all() as $message) {
        {{$message}}
        @endforeach
        <form method="post" action="{{route('plan_information.store')}}" class="slide">
            @csrf
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">subtitles</i>
                </span>
                <input name="name" required="" placeholder="Name">
            </div>

            <div class="input-box submit">
                <button class="btn btn-success btn-iconed"><i class="material-icons">save</i> Add Plan Information</button>
            </div>


        </form>
    </div>
@endsection

@section('css')
    <style>
        #spot-break{display: none;}
    </style>
@endsection


