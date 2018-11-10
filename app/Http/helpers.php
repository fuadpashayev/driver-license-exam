<?php


use Illuminate\Support\Facades\Route;

function previousRoute(){
    $route = Route::current()->getName();
    $id='';
    $previous = null;
    foreach(Route::current()->parameters() as $route=>$id_param) { $id = $id_param; }
    switch ($route){
        case $id && 'user':
        case $id && 'settings':
        case $id && 'category':
        case $id && 'question':
            $previous = route($route.'.index');
        break;
    }
   return $previous;
}

function createRoute(){
    $route = Route::current()->getName();
    $route = explode('.',$route)[0];
    $id='';
    $previous = null;
    $exceptions = ['login','home'];
    if(!in_array($route,$exceptions)){
    foreach(Route::current()->parameters() as $route=>$id_param) { $id = $id_param; }
    switch ($route){
        case !$id && 'user':
        case !$id && 'settings':
        case !$id && 'category':
        case !$id && 'question':
            $previous = route($route.'.create');
            break;
    }
    }
    return $previous;
}
