@extends('layouts.app')
@section('title')
    <title>Questions</title>
@endsection
@section('content')
    <div class="container-fluid">
        <table class="data" id="question" border="1">
            <thead>
            <tr>
                <td>Name</td>
                <td>Price</td>
                <td>Currency</td>
                <td>Duration</td>
                <td>Information</td>
            </tr>
            </thead>
            <tbody>
            @foreach($plans as $plan)
                <tr id="{{$plan->id}}">
                    <td>{{$plan->name}}</td>
                    <td>{{$plan->price}}</td>
                    <td>{{$plan->currency}}</td>
                    <td>{{$plan->duration}}</td>
                    <td>{{$plan->information}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="{{asset('general/js/question.js')}}"></script>
@endsection




