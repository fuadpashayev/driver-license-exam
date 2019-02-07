<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1"/>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('general/css/pricing.css')}}"/>
</head>
<body>
<style>
    .col-lg-6 {
        margin: auto !important;
    }
    .fa-ul {
        margin-left: 0 !important;
        text-align: center;
    }
</style>
<div class="container col-md-7">
    <div class="col-lg-6">
        <div class="card mb-5 mb-lg-0">
            <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">{{$plan->name}}</h5>
                <h6 class="card-price text-center">{{$plan->currency}}{{$plan->price}}<span class="period">/{{$plan->period}}</span></h6>
                <hr>
                <ul class="fa-ul">
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                </ul>
                <a href="{{route('pricing.index')}}"><div class="btn btn-block btn-danger text-uppercase">Error Happened. Return Back</div></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
