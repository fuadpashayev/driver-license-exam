@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <table class="data" id="user" border="1">
            <thead>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Role</td>
                <td>Options</td>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr id="{{$user->id}}">
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->roles[0]->display_name}}</td>
                    <td><button class="btn btn-primary edit"><i class="material-icons" data-target="#deleteModal">edit</i> Edit</button> <button class="btn btn-danger delete" data-target="#deleteModal"><i class="material-icons">delete</i> Delete</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('general/css/user.css')}}"/>
@endsection

@section('js')
    <script src="{{asset('general/js/user.js')}}"></script>
@endsection


