@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <table class="data" id="category" border="1">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Question Number</td>
                    <td>Options</td>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr id="{{$category->id}}">
                    <td>{{$category->name}}</td>
                    <td>{{count($category->questions)}}</td>
                    <td><button class="btn btn-primary edit"><i class="material-icons" data-target="#deleteModal">edit</i> Edit</button> <button class="btn btn-danger delete" data-target="#deleteModal"><i class="material-icons">delete</i> Delete</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('general/css/category.css')}}"/>
@endsection

@section('js')
    <script src="{{asset('general/js/category.js')}}"></script>
@endsection


