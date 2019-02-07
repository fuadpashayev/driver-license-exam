<html>
    <head>
        <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1"/>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('general/css/payment.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
    <style>
        .container{

        }
        .card-select {
            width: 100%;
            display: flex;
            align-items: center;
        }

        .card-select div {
            margin: 5px;
            cursor: pointer;
        }

        .card-select div:hover img,.card-select div.active img {
            transition: 220ms;
            transform: scale(1.2);
            opacity: 1;
        }
        .card-select div img {
            width: 50px;
            height: 50px;
            opacity: 0.2;
        }
        @media screen and (max-width: 400px){
            h2{
                font-size: 25px !important;
            }
        }
    </style>
        <div class="container col-md-6">
            <h2 class="my-4 text-center">Purchase <span style="color:#1260ff">{{$plan->name}}</span> Plan</h2>
            <form action="{{route('payment.charge')}}" method="post" id="payment-form">
                @csrf
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <input type="hidden" name="plan_id" value="{{$plan->id}}">
                <div class="card-select">
                    <div class="active" id="visa"><img src="https://js.stripe.com/v3/fingerprinted/img/visa-7083b83fcd2208554e8236baed1a12b0.svg" alt=""/></div>
                    <div id="mastercard"><img src="https://js.stripe.com/v3/fingerprinted/img/mastercard-a1c63f1fc8f5bab551f8f798a63eb3e1.svg" alt=""/></div>
                </div>
                <div class="form-row">
                    <div id="card-element" class="form-control"></div>
                    <div id="card-errors" role="alert"></div>
                </div>
                <button>Submit Payment</button>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="{{asset('general/js/charge.js')}}"></script>
    </body>
</html>
