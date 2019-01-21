<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index(){
        $plans = '';
        return view('pricing.index',['plans'=>$plans]);
    }
}
