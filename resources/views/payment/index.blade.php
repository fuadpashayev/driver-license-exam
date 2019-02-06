<html>
    <head>
        <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1"/>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('general/css/payment.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <h2 class="my-4 text-center">Purchase <span style="color:#1260ff">{{$plan->name}}</span> Plan</h2>
            <form action="{{route('payment.charge')}}" method="post" id="payment-form">
                @csrf
                <input type="hidden" name="user_id" value="{{$user_id}}">
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
