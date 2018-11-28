<?php


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
    $exceptions = ['login','home','setting'];
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


function routeCheck($check){
    $route = Route::currentRouteName();
    return preg_match("/$check/im",$route);
}
