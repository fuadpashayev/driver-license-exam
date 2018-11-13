@extends('layouts.app')

@section('title')
    <title>Add User</title>
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($errors->all() as $message) {
        {{$message}}
        @endforeach
        <form method="post" action="{{route('user.store')}}" class="slide">
            @csrf
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">person</i>
                </span>
                <input name="name" required="" placeholder="Name">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">alternate_email</i>
                </span>
                <input name="email" required="" placeholder="Email">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">lock</i>
                </span>
                <input name="password" required="" placeholder="Password">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">lock</i>
                </span>
                <input name="password_confirmation" required="" placeholder="Confirm Password">
            </div>

            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">group_work</i>
                </span>
                <div class="dropdown-select">
                    <div class="select">
                        <span>Role</span>
                        <i class="fa fa-chevron-left"></i>
                    </div>
                    <input type="hidden" name="role" value="">
                    <ul class="dropdown-menu-select">
                        <li id="user">User</li>
                        <li id="editor">Editor</li>
                        <li id="admin">Admin</li>
                    </ul>
                </div>
            </div>

            <div class="input-box submit">
                <button class="btn btn-success btn-iconed"><i class="material-icons">save</i> Add User</button>
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


