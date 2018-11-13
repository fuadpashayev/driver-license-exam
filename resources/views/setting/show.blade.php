@extends('layouts.app')

@section('title')
    <title>{{$user->name}}</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header relative">{{$user->name}}
                <div class="right-seat">
                    <a href="{{route('user.edit',$user->id)}}"><button class="btn btn-primary btn-iconed"><i class="material-icons">edit</i> Edit</button></a>
                    <a href="" onclick="return false;"><button class="btn btn-danger btn-iconed" id="{{$user->id}}" route="{{route('user.destroy',['id'=>$user->id])}}" role="delete"><i class="material-icons">delete</i> Delete</button></a>
                </div>
            </div>
            <div class="card-body">
                <div class="card-menu"> <div>Email</div> <div>{{$user->email}}</div> </div>
                <div class="card-menu"> <div>Role</div> <div>{{$user->roles[0]->display_name}}</div> </div>
                <div class="card-menu"> <div>Create Time</div> <div>{{$user->created_at}}</div> </div>
                <div class="card-menu"> <div>Update Time</div> <div>{{$user->updated_at}}</div> </div>

            </div>
        </div>
    </div>
@endsection


