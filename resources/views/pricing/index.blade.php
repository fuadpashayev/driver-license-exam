@extends('layouts.app')
@section('title')
    <title>Questions</title>
@endsection
@section('content')
    <section class="pricing py-5">
        <h1 class="header"> Tariff Plans </h1>
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Free</h5>
                            <h6 class="card-price text-center">$0<span class="period">/month</span></h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="material-icons">check</i></span>Single User</li>
                                <li><span class="fa-li"><i class="material-icons">check</i></span>5GB Storage</li>
                                <li><span class="fa-li"><i class="material-icons">check</i></span>Unlimited Public Projects</li>
                                <li><span class="fa-li"><i class="material-icons">check</i></span>Community Access</li>
                                <li class="text-muted"><span class="fa-li"><i class="material-icons">close</i></span>Unlimited Private Projects</li>
                                <li class="text-muted"><span class="fa-li"><i class="material-icons">close</i></span>Dedicated Phone Support</li>
                                <li class="text-muted"><span class="fa-li"><i class="material-icons">close</i></span>Free Subdomain</li>
                                <li class="text-muted"><span class="fa-li"><i class="material-icons">close</i></span>Monthly Status Reports</li>
                            </ul>
                            <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a>
                        </div>
                    </div>
                </div>



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




