@extends('layouts.app')

@section('title')
    <title>Users</title>
@endsection

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
                    <td>{{isset($user->roles[0])?$user->roles[0]->display_name:'User'}}</td>
                    <td>
                        <a href="{{route('user.show',$user->id)}}"><button class="btn btn-secondary view" role="view"><i class="material-icons" data-target="#deleteModal">remove_red_eye</i> View</button></a>
                        <a href="{{route('user.edit',$user->id)}}"><button class="btn btn-primary edit" role="edit"><i class="material-icons" data-target="#deleteModal">edit</i> Edit</button></a>
                        <a href="" onclick="return false;"><button class="btn btn-danger delete" route="{{route('user.destroy',['id'=>$user->id])}}" role="delete" data-target="#deleteModal"><i class="material-icons">delete</i> Delete</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="{{asset('general/js/user.js')}}"></script>
@endsection


