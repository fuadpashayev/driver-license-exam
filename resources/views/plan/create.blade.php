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
                <input name="price" required="" placeholder="Price">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">monetization_on</i>
                </span>
                <input name="currency" required="" placeholder="Currency">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">today</i>
                </span>
                <input name="period" required="" placeholder="Period">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">list_alt</i>
                </span>
                <select name="information[]" class="selectpicker" multiple>
                    @foreach($infos as $info)
                        <option value="{{$info->name}}">{{$info->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-box submit">
                <button class="btn btn-success btn-iconed"><i class="material-icons">save</i> Add Plan</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
    <script src="{{asset('general/js/plan.js')}}"></script>
@endsection


