<?php

namespace App\Http\Controllers\front;

use App\Models\Blog;
use App\Models\News;
use App\Models\Artical;
use App\Models\Knowledge;
use App\Models\Employment;
use App\Models\ListSetting;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\KnowledgeCategory;
use App\Http\Controllers\Controller;

class Homecontroller extends Controller
{
    public function index()
    {
        return view('front.index', 

    );
    }
}
