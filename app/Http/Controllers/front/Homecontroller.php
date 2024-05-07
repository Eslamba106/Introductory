<?php

namespace App\Http\Controllers\front;

use App\Models\Blog;
use App\Models\News;
use App\Models\Artical;
use App\Models\Knowledge;
use App\Models\Employment;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Models\KnowledgeCategory;
use App\Http\Controllers\Controller;
use App\Models\ListSetting;

class Homecontroller extends Controller
{
    public function index(){

        $blog_departments = Blog::paginate(3);
        $blog_artical = Artical::paginate(3);
        $news_category = NewsCategory::paginate(3);
        $news = News::paginate(3);
        $knowledge_category = KnowledgeCategory::paginate(3);
        $knowledge_center   = Knowledge::paginate(3);
        $jobs = Employment::paginate(3);
        $list_settings = ListSetting::first();
        return view('front.index' , compact(['blog_departments' , 'blog_artical' , 'news_category' ,'news' , 'knowledge_category' , 'knowledge_center' , 'jobs' , 'list_settings' ]));
        
    }
}
