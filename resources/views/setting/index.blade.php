@extends('layouts.app')

@section('title')
    <title>Settings</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header relative">Settings
                <div class="right-seat">
                    <a href="{{route('setting.edit',1)}}"><button class="btn btn-primary btn-iconed"><i class="material-icons">edit</i> Edit</button></a>
                </div>
            </div>
            <div class="card-body">
                <div class="card-menu"> <div>Title</div> <div>{{$settings->title}}</div> </div>
                <div class="card-menu"> <div>URL</div> <div>{{$settings->url}}</div> </div>

            </div>
        </div>
    </div>
@endsection


