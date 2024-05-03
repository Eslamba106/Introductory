<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Support\Str;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.type:admin');
    }
    public function index(){

        $news = News::paginate(); 
        $news_categories = NewsCategory::all();
        return view('admin.news_ads.index' , compact(['news' , 'news_categories']));
    }

    public function store(Request $request){

        // $request->validate(['name' => "required"]);

        $admin = auth()->user();
        // $moderator = auth()->user();
        // if($admin != null){
        $writer = $admin->id;
        $writer_type = "admin";
        // dd($request);

        $request->validate([
            "title" => "required|string|max:255",
            "content" => "required",
            // "image" => "mimes:png,jpg",
            "status" => "required",
            "news_category_id" => "required",
        ]);    
        $slug = Str::slug($request->title, '-');
        $path = $this->uploadImage($request);
        // dd($path);
        News::create([
            "title" => $request->title,
            "content" => $request->content,
            "status" => $request->status,
            "news_category_id" => $request->news_category_id ,
            "writer" => $writer,
            "writer_type" => $writer_type,
            "image" => $path,
            "slug" => $slug,
            'tags' => $request->tags,
        ]);
        return redirect()->route('admin.news_ads.index');
    }

    public function edit($id){

        $news = News::findOrFail($id);
        $news_categories = NewsCategory::all();

        return view('admin.news_ads.edit' ,  compact(['news' , 'news_categories']));
    }
    public function show($id){
        
        $writer = auth()->user()->name;
        $news = News::findOrFail($id);
        $tags = json_decode($news->tags);
        $news->increment('views');
        $news_category = NewsCategory::find($news->news_category_id);
        return view('admin.news_ads.show', compact(['news' , 'news_category' , 'writer' , 'tags']));
    }

    public function update(Request $request){

        $news =  News::findOrFail($request->id);
        
        $admin = auth()->user();
        // $moderator = auth()->user();
        // if($admin != null){
        $writer = $admin->id;
        $writer_type = "admin";
        // $request->validate(['name' => "required"]);
        $new_image = $this->uploadImage($request);
        $old_image = $news->image;
        if ($new_image) {
            $image = $new_image;
        }else{
            $image = $old_image;
        }
        $slug = Str::slug($request->title, '-');
        // $path = $this->uploadImage($request);
        $news->update([
            "title" => $request->title,
            "content" => $request->content,
            "status" => $request->status,
            "news_category_id" => $request->news_category_id ,
            "writer" => $writer,
            "writer_type" => $writer_type,
            "image" => $image,
            "slug" => $slug,
            'tags' => $request->tags,
        ]);
        return redirect()->route('admin.news_ads.index');
    }
    public function delete(Request $request){

        // dd($request->id);
        $department = News::findOrFail($request->id);
        $department->delete();

        return redirect()->route('admin.news_ads.index')->with('delete_department');
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return "there is no file";
        } else {
            $file = $request->file('image');
            $path = $file->store('news', [
                'disk' => 'public',
            ]);
            return $path;
        }
    }
}
