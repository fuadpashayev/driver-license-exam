<?php

namespace App\Http\Controllers;

use App\Plan;
use App\PlanInformation;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index(){
        $plans = Plan::all();
        $infos = PlanInformation::all();
        return view('pricing.index',['plans'=>$plans,'infos'=>$infos]);
    }
}
