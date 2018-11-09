@extends('layouts.app')

@section('title')
    <title>{{$user->name}} - Edit</title>
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($errors->all() as $message) {
            {{$message}}
        @endforeach
        <form method="post" action="{{route('user.update',['id'=>$user->id])}}" class="slide">
            @csrf
            @method('put')
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">person</i>
                </span>
                <input name="name" required="" placeholder="Name" value="{{$user->name}}">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">alternate_email</i>
                </span>
                <input name="email" required="" placeholder="Email" value="{{$user->email}}">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">group_work</i>
                </span>
                <div class="dropdown-select">
                    <div class="select">
                        <span>{{$user->roles[0]->display_name}}</span>
                        <i class="fa fa-chevron-left"></i>
                    </div>
                    <input type="hidden" name="role" value="{{$user->roles[0]->name}}">
                    <ul class="dropdown-menu-select">
                        <li id="user" @if($user->roles[0]->name=='user') class="active" @endif>User</li>
                        <li id="editor" @if($user->roles[0]->name=='editor') class="active" @endif>Editor</li>
                        <li id="admin" @if($user->roles[0]->name=='admin') class="active" @endif>Admin</li>
                    </ul>
                </div>
            </div>

            <div class="input-box submit">
               <button class="btn btn-success btn-iconed"><i class="material-icons">save</i> Save</button>
            </div>


        </form>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('general/css/user.css')}}"/>
    <style>
        #spot-break{display: none;}
    </style>
@endsection

@section('js')
    <script src="{{asset('general/js/user.js')}}"></script>
@endsection


