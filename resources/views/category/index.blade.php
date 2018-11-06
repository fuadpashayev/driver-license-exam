@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($categories as $category)
            <p>{{$category->name}}</p>
        @endforeach
    </div>
@endsection
