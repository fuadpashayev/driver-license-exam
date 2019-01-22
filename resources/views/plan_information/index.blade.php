@extends('layouts.app')
@section('title')
    <title>Plans</title>
@endsection
@section('content')
    <div class="container-fluid">
        <table class="data" id="question" border="1">
            <thead>
            <tr>
                <td>Name</td>
                <td>Options</td>
            </tr>
            </thead>
            <tbody>
            @foreach($infos as $info)
                <tr id="{{$info->id}}">
                    <td>{{$info->name}}</td>
                    <td><a href="{{route('plan_information.edit',$info->id)}}"><button class="btn btn-primary edit"><i class="material-icons">edit</i> Edit</button></a> <a href="#"><button class="btn btn-danger delete" data-target="#deleteModal" role="delete" route="{{route('plan_information.destroy',['id'=>$info->id])}}"><i class="material-icons">delete</i> Delete</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection





