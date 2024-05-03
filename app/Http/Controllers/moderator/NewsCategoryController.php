<?php

namespace App\Http\Controllers\moderator;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.type:moderator');
    }
    public function index(){
        $news_categories = NewsCategory::paginate(); 

        return view('moderator.news.index' , compact('news_categories'));
    }

    public function store(Request $request){

        $request->validate(['name' => "required"]);
        // dd($request);
        NewsCategory::create([
            "name" => $request->name,
            "parent_id" => $request->parent_id ?? 0,
        ]);
        return redirect()->route('user.news_categories.index');
    }

    public function update(Request $request){

        $department =  NewsCategory::findOrFail($request->id);
        $request->validate(['name' => "required"]);
        $department->update([
            "name" => $request->name,
            "parent_id" => $request->parent_id ?? 0,
        ]);
        return redirect()->route('user.news_categories.index');
    }
    public function delete(Request $request){

        // dd($request->id);
        $department = NewsCategory::findOrFail($request->id);
        $department->delete();

        return redirect()->route('user.news_categories.index')->with('delete_department');
    }
}
