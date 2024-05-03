<?php

namespace App\Http\Controllers\moderator;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index(){

        $departments = Blog::paginate();
        return view('moderator.blog_department.index' , compact('departments'));
    }
    public function store(Request $request){

        $request->validate(['name' => "required"]);
        // dd($request);
        Blog::create($request->all());
        return redirect()->route('user.blog_department.index');
    }
    public function update(Request $request){

        $department = Blog::findOrFail($request->id);
        $request->validate(['name' => "required"]);
        $department->update($request->all());
        return redirect()->route('user.blog_department.index');
    }
    public function delete(Request $request){

        $department = Blog::findOrFail($request->id);
        $department->delete();
        Session::flash('delete_department');

        return redirect()->route('user.blog_department.index')->with('delete_department');
    }
}
