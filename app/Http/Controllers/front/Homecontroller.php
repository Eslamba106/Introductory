<?php

namespace App\Http\Controllers\front;


use App\Models\Blog;
use App\Models\Artical;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // $blog_departments = Blog::first();
        // $blog_artical = Artical::first();
        // dd($blog_departments->artical->count());
        return view('front.index');
    }
}
