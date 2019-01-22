@extends('layouts.app')

@section('title')
    <title>Edit Plan Information - {{$info->name}}</title>
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($errors->all() as $message) {
        {{$message}}
        @endforeach
        <form method="post" action="{{route('plan_information.update',['id'=>$info->id])}}" class="slide">
            @csrf
            @method('put')
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">subtitles</i>
                </span>
                <input name="name" required="" placeholder="Name" value="{{$info->name}}">
            </div>

            <div class="input-box submit">
                <button class="btn btn-success btn-iconed"><i class="material-icons">save</i> Edit Plan Information</button>
            </div>


        </form>
    </div>
@endsection

