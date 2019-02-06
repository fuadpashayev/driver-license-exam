<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Stripe\Stripe;


class PaymentController extends Controller
{
    public  $user;
    public  $user_id;
    public function __construct()
    {
        $this->user_id = @$_COOKIE['user_id'];
        $this->user = User::find($this->user_id);
    }

    public function index($id){
        if(!$this->user)
            return redirect()->route('payment.order',['id'=>$id]);
        else{
            $plan = Plan::find($id);
            return view('payment.index',['plan'=>$plan,'user_id'=>$this->user_id]);
        }
    }

    public function order($id){
        if(!$this->user){
            return view('payment.login',['product_id'=>$id]);
        }else{
            return redirect()->route('payment.index',['id'=>$id]);
        }
    }

    public function sign(Request $request){
        $auth = new Api\AuthController;
        $login = $auth->login($request);
        $data = $login->getData();
        $token = $data->access_token;
        setcookie('user_id',$data->id);
        return redirect()->route('payment.index',['id'=>$request->product_id]);
    }
    public function charge(Request $request){
//        Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
//        $charge = \Stripe\Charge::create([
//            'amount' => 125,
//            'currency' => 'usd',
//            'source' => 'tok_visa',
//            'receipt_email' => 'fuad.pashayev140@gmail.com',
//            'description' => 'User purchase for premium package. Teori Prove'
//        ]);

        dd($request);
    }
}
