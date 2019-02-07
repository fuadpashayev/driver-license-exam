<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Transaction;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cookie;
use Stripe\Stripe;


class PaymentController extends Controller
{
    public  $user;
    public  $user_id;
    public  $api_key;
    public  $time;
    public function __construct()
    {
        $this->user_id = @$_COOKIE['user_id'];
        $this->user = User::find($this->user_id);
        $this->api_key = "sk_test_la0qDV6GzbZruSegZBm94hSN";
        Stripe::setApiKey($this->api_key);
        $this->time = now()->timestamp;
    }

    public function index($id){
        if(!$this->user)
            return redirect()->route('payment.order',['id'=>$id]);
        else{
            $plan = Plan::find($id);
            if($plan)
                return view('payment.index',['plan'=>$plan,'user_id'=>$this->user_id]);
            else
                return redirect()->route('pricing.index');
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
        if($request->sign_type=='login') $sign = $auth->login($request);
        else $sign = $auth->register($request);
        $data = $sign->getData();
        setcookie('user_id',$data->id,$this->time+300);
        return redirect()->route('payment.index',['id'=>$request->product_id]);
    }

    public function charge(Request $request){
        $plan = Plan::find($request->plan_id);
        if(!$plan || !$this->user_id){
            return redirect()->route('pricing.index');
        }
        $amount = $plan->price*100;
        $currency = 'usd';
        $email = $this->user->email;
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
            $transaction->user_id = $request->user_id;
            $transaction->plan_id = $request->plan_id;
            $transaction->amount = $amount;
            $transaction->currency = $currency;
            $transaction->status = $status;
            $transaction->save();

            $update_user = User::find($this->user_id);
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
        if($plan && $this->user_id){
            setcookie('user_id','',time()-3600,'/');
            return view('payment.success',['plan'=>$plan]);
        }else{
            return redirect()->route('pricing.index');
        }
    }

    public function error($plan,$message){
        if($this->user_id){
            setcookie('user_id','',time()-3600,'/');
            return view('payment.error',['message'=>$message,'plan'=>$plan]);
        }else{
            return redirect()->route('pricing.index');
        }
    }
}
