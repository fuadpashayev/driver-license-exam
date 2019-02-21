<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Transaction;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;


class PaymentController extends Controller
{
    public  $user;
    public  $user_id;
    public  $api_key;
    public  $time;
    public function __construct()
    {
        $this->api_key = "sk_test_la0qDV6GzbZruSegZBm94hSN";
        Stripe::setApiKey($this->api_key);
        $this->time = now()->timestamp;
    }

    public function index($id){
        $user = Auth::user();
        if(!$user)
            return redirect()->route('payment.order',['id'=>$id]);
        else{
            $plan = Plan::find($id);
            if($plan)
                return view('payment.index',['plan'=>$plan,'user_id'=>$user->id]);
            else
                return redirect()->route('pricing.index');
        }
    }

    public function order($id){
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }else{
            return redirect()->route('payment.index',['id'=>$id]);
        }
    }


    public function charge(Request $request){
        $user = Auth::user();
        $plan = Plan::find($request->plan_id);
        if(!$plan || !$user){
            return redirect()->route('pricing.index');
        }
        $amount = $plan->price*100;
        $currency = 'usd';
        $email = $user->email;
        $description = "Purchase of {$plan->name} plan";
        $token = $request->stripeToken;
        $customer = \Stripe\Customer::create(array(
            "email" => $email,
            "source" => $token
        ));

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $amount,
                'currency' => $currency,
                'receipt_email' => $email,
                'description' => $description,
                'customer' => $customer->id
            ]);
            $success = 1;
        }catch (\Stripe\Error\Base $e) {
            $error = $e->getMessage();
        } catch (Exception $e) {
            $error = $e->getMessage();
        }



        $status = $charge->status;


        if($status=='succeeded'){

            $transaction = new Transaction();
            $transaction->transaction_id = $charge->id;
            $transaction->user_id = $user->id;
            $transaction->plan_id = $request->plan_id;
            $transaction->amount = $amount;
            $transaction->currency = $currency;
            $transaction->status = $status;
            $transaction->save();

            $update_user = User::find($user->id);
            $update_user->payment_type = $plan->name;
            $update_user->payment_start_time = $this->time;
            $end_time = $this->time+$plan->period_timestamp;
            $update_user->payment_end_time = $end_time;
            $update_user->save();
            //return $this->error($plan,'Balansiniz kifayet qeder deyil');
            return $this->success($plan);
        }else{
            return $this->error($plan,$error);
        }


    }

    public function success($plan){
        $user = Auth::user();
        if($plan && $user)
            return view('payment.success',['plan'=>$plan]);
        else
            return redirect()->route('pricing.index');
    }

    public function error($plan,$message){
        $user = Auth::user();
        if($user)
            return view('payment.error',['message'=>$message,'plan'=>$plan]);
        else
            return redirect()->route('pricing.index');
    }
}
