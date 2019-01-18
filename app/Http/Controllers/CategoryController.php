<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('category.index',['categories'=>$categories]);
    }


    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
            'image.*' => ['required', 'image'],
        ]);
        $image_url = '/storage/'.$request->file('image')->store('image');
        Category::create([
            'name' => $request->name,
            'image_url' => $image_url,
        ]);
        return redirect()->route('category.index');
    }

    public function show($id)
    {
        $questions = Question::where("parent_id",null)->where("category_id",$id)->get();

        return view('category.show',['questions'=>$questions]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit',['category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
            'image.*' => ['required', 'image'],
        ]);
        $image_url = '/storage/'.$request->file('image')->store('image');
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->image_url = $image_url;
        $category->save();
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $user = Category::find($id);
        $user->delete();
        if($user)
            echo 'ok';
        else
            echo'no';
    }
}
