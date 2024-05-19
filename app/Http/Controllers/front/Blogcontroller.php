<?php

namespace App\Http\Controllers\front;

use App\Models\Blog;
use App\Models\Artical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(){
        $categories = Blog::paginate(6);
        $articals  = Artical::paginate(6);
        $last_articals  = Artical::latest()->get();
        // dd($last_articals);

        return view('front.blog' , compact(['categories' , 'articals' , 'last_articals']));
    }
}
