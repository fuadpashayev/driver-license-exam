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
                <td>Price</td>
                <td>Currency</td>
                <td>Period</td>
                <td>Information</td>
                <td>Options</td>
            </tr>
            </thead>
            <tbody>
            @foreach($plans as $plan)
                <tr id="{{$plan->id}}">
                    <td>{{$plan->name}}</td>
                    <td>{{$plan->price}}</td>
                    <td>{{$plan->currency}}</td>
                    <td>{{$plan->period}}</td>
                    <td>
                        @php $infos = json_decode($plan->information,1); @endphp
                        @foreach($infos as $info)
                            @php
                                $info = \App\PlanInformation::find($info);
                            @endphp
                            <li>{{$info->name}}</li>
                        @endforeach
                    </td>
                    <td><a href="{{route('plan.edit',$plan->id)}}"><button class="btn btn-primary edit"><i class="material-icons">edit</i> Edit</button></a> <a href="#"><button class="btn btn-danger delete" data-target="#deleteModal" role="delete" route="{{route('plan.destroy',['id'=>$plan->id])}}"><i class="material-icons">delete</i> Delete</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="{{asset('general/js/question.js')}}"></script>
@endsection




