<?php


use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Route;

function previousRoute(){
    $router = Route::current()->getName();
    $explode = explode('.',$router);
    if(count($explode)>1){
        $route = $explode[0];
        $create = $explode[1]=="create";
    }else{
        $route = $router;
        $create = false;
    }
    $id='';
    $previous = null;
    foreach(Route::current()->parameters() as $router=>$id_param) { $id = $id_param; }
    switch ($route){
        case ($id || $create) && 'user':
        case ($id || $create) && 'setting':
        case ($id || $create) && 'category':
        case ($id || $create) && 'question':
            $previous = route($route.'.index');
        break;
    }
   return $previous;
}

function createRoute(){
    $router = Route::current()->getName();
    $explode = explode('.',$router);
    if(count($explode)>1){
        $route = $explode[0];
        $create = $explode[1]=="create";
    }else{
        $route = $router;
        $create = false;
    }
    $id='';
    $next = null;
    $exceptions = ['login','home','setting','pricing','register'];
    if(!in_array($route,$exceptions)){
    foreach(Route::current()->parameters() as $router=>$id_param) { $id = $id_param; }
    switch ($route){
        case !$id && !$create && 'user':
        case !$id && !$create && 'category':
        case !$id && !$create && 'question':
            $next = route($route.'.create');
            break;
    }
    }
    return $next;
}

function additionalCreateCheck(){
    $route = Route::current();
    $return = false;
    if($route->getName()=="category.show"){
        $category_id = $route->category;
        $return = \route("question.createInCategory",["category_id"=>$category_id]);
    }
    return $return;

}

function routeCheck($check){
    $route = Route::currentRouteName();
    $route = explode('.',$route)[0];
    return $check===$route;
}

function isAdmin(){
    $roles = Auth::user()->roles[0]->name;
    return $roles=='admin';
}

function settings(){
    $settings = \App\Settings::find(1);
    return $settings;
}

function site_url(){
    $site_url = \App\Settings::find(1)->url;
    return $site_url;
}

function timestamp(){
    return now()->timestamp;
}

function checkPaymentTime($user_id){
    $user = User::find($user_id);
    if($user->payment_end_time<timestamp()){
        $user->payment_type = "free";
        $user->payment_start_time = null;
        $user->payment_end_time = null;
        $user->save();
    }
}

