<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $users_count = DB::table("users")->count();
        $categories_count = DB::table("categories")->count();
        $questions_count = DB::table("questions")->where('parent_id',null)->count();
        $sub_questions_count = DB::table("questions")->whereNotNull('parent_id')->count();

        $audios_count = count(Storage::allFiles('audio'));
        $images_count = count(Storage::allFiles('image'));

        $counts = ['user'=>$users_count,'category'=>$categories_count,'question'=>$questions_count,'sub_question'=>$sub_questions_count,'audio'=>$audios_count,'image'=>$images_count];
        return view('home',['users'=>$users,'counts'=>$counts]);
    }
}
