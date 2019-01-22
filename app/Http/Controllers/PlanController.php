<?php

namespace App\Http\Controllers;

use App\Plan;
use App\PlanInformation;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        $infos = [];



        return view('plan.index',['plans'=>$plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infos = PlanInformation::all();
        return view('plan.create',['infos'=>$infos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string'],
            'price' => ['required','integer'],
            'currency' => ['required','string'],
            'period' => ['required','string'],
            'information' => ['required','array']
        ]);

        $plan = new Plan;
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->currency = $request->currency;
        $plan->period = $request->period;
        $plan->information = json_encode($request->information);
        $plan->save();

        return redirect()->route('plan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plan::find($id);
        $infos = PlanInformation::all();
        return view('plan.edit',['plan'=>$plan,'infos'=>$infos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','string'],
            'price' => ['required','integer'],
            'currency' => ['required','string'],
            'period' => ['required','string'],
            'information' => ['required','array']
        ]);

        $plan = Plan::find($id);
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->currency = $request->currency;
        $plan->period = $request->period;
        $plan->information = json_encode($request->information);
        $plan->save();

        return redirect()->route('plan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        echo $plan?'ok':'no';
    }
}
