@extends('layouts.app')

@section('title')
    <title>Add Plan</title>
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($errors->all() as $message) {
        {{$message}}
        @endforeach
        <form method="post" action="{{route('plan.store')}}" class="slide">
            @csrf
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">subtitles</i>
                </span>
                <input name="name" required="" placeholder="Name">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">attach_money</i>
                </span>
                <input name="email" required="" placeholder="Price">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">group_work</i>
                </span>
                <select class="selectpicker" multiple>
                    <option>Mustard</option>
                    <option>Ketchup</option>
                    <option>Relish</option>
                </select>
            </div>

            <div class="input-box submit">
                <button class="btn btn-success btn-iconed"><i class="material-icons">save</i> Add User</button>
            </div>


        </form>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('general/css/plan.css')}}"/>
    <style>
        #spot-break{display: none;}
    </style>
@endsection

@section('js')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
    <script src="{{asset('general/js/plan.js')}}"></script>
@endsection


