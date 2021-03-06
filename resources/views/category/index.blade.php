@extends('layouts.app')

@section('title')
    <title>Categories</title>
@endsection

@section('content')
    <div class="container-fluid">
        <table class="data" id="category" border="1">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Question Number</td>
                    <td>Options</td>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                @php
                    $count = \App\Question::where(["parent_id"=>null,"category_id"=>$category->id])->get()->count();
                @endphp
                <tr id="{{$category->id}}">
                    <td><a class="image" href="{{asset($category->image_url)}}"><img title="{{$category->name}}" src="{{asset($category->image_url)}}"/></a></td>
                    <td>{{$category->name}}</td>
                    <td>{{$count}}</td>
                    <td><a href="{{route('category.show',$category->id)}}"><button class="btn btn-secondary view"><i class="material-icons">remove_red_eye</i> View</button></a> <a href="{{route('category.edit',$category->id)}}"><button class="btn btn-primary edit"><i class="material-icons" data-target="#deleteModal">edit</i> Edit</button></a> <a href="#"><button class="btn btn-danger delete" data-target="#deleteModal" role="delete" route="{{route('category.destroy',['id'=>$category->id])}}"><i class="material-icons">delete</i> Delete</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="{{asset('general/js/category.js')}}"></script>
@endsection


