@extends('layouts.app')
@section('title')
    <title>Tariff Plans</title>
@endsection
@section('content')
    <section class="pricing py-5">
        <h1 class="header"> Tariff Plans </h1>
        <div class="container">
            <div class="row">
                @foreach($plans as $plan)
                    <div class="col-lg-4">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">{{$plan->name}}</h5>
                                <h6 class="card-price text-center">{{$plan->currency}}{{$plan->price}}<span class="period">/{{$plan->period}}</span></h6>
                                <hr>
                                <ul class="fa-ul">
                                    @foreach($infos as $info)
                                        @if(in_array($info->name,json_decode($plan->information,1)))
                                            <li><span class="fa-li"><i class="material-icons">check</i></span>{{$info->name}}</li>
                                        @else
                                            <li class="text-muted"><span class="fa-li"><i class="material-icons">close</i></span>{{$info->name}}</li>
                                        @endif
                                    @endforeach
                                </ul>
                                <a href="#" class="btn btn-block btn-primary text-uppercase">Order Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('general/css/pricing.css')}}"/>
@endsection

@section('js')
    <script src="{{asset('general/js/pricing.js')}}"></script>
@endsection




