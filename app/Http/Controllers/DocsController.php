<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DocsController extends Controller
{
    public function auth(){
        $user = Auth::user();
        return view('docs.auth',['user'=>$user]);
    }

    public function category(){
        return view('docs.category');
    }

    public function question(){
        return view('docs.question');
    }
}
