<?php

namespace App\Http\Controllers\front;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsAdsController extends Controller
{
    public function index(){
        $categories = NewsCategory::paginate(6);
        $news  = News::paginate(6);
        $last_news  = News::latest()->get();
        // dd($last_articals);

        return view('front.news' , compact(['categories' , 'news' , 'last_news']));
    }
}
