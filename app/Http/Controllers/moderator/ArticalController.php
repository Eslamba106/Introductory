<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Artical;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.type:admin');
    }
    public function index()
    {

        $articals = Artical::paginate();
        $departments = Blog::all();
        return view('admin.blog_artical.index', compact(['articals' , 'departments']));
    }

    public function store(Request $request)
    {
        $admin = auth()->user();
        // $moderator = auth()->user();
        // if($admin != null){
        $writer = $admin->id;
        $writer_type = "admin";
        // dd($request->all());

        $request->validate([
            "title" => "required|string|max:255",
            "content" => "required",
            // "image" => "mimes:png,jpg",
            "status" => "required",
            "blog_id" => "required",
        ]);    
        $slug = Str::slug($request->title, '-');
        $path = $this->uploadImage($request);
        Artical::create([
            "title" => $request->title,
            "content" => $request->content,
            "status" => $request->status,
            "blog_id" => $request->blog_id ,
            "writer" => $writer,
            "writer_type" => $writer_type,
            "image" => $path,
            "slug" => $slug,
            'tags' => $request->tags,
        ]);
        return  redirect()->route('admin.blog_artical.index');
    }

    public function edit($id)
    {

        $artical = Artical::findOrFail($id);
        $tags = json_decode($artical->tags);
        $departments = Blog::all();
        return view('admin.blog_artical.edit', compact(['artical' , 'departments' , 'tags']));
    }
    public function show($id)
    {

        $artical = Artical::findOrFail($id);
        $tags = json_decode($artical->tags);

        $writer = auth()->user()->name;
        return view('admin.blog_artical.show', compact(['artical' , 'writer' , 'tags']));
    }
    public function update(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "content" => "required",
            "status" => "required",
            "blog_id" => "required",
        ]);
        $artical = Artical::findOrFail($request->id);
        if ($artical->writer_type == "admin") {
            $new_image = $this->uploadImage($request);
            $old_image = $artical->image;
            if ($new_image) {
                $image = $new_image;
            }else{
                $image = $old_image;
            }
            $slug = Str::slug($request->title, '-');

            $artical->update([
                "title" => $request->title,
                "content" => $request->content,
                "status" => $request->status,
                "artical_id" => $request->artical_id,
                "writer" => $artical->writer,
                "writer_type" => $artical->writer_type,
                "image" => $image,
                "slug" => $slug,

            ]);
            if ($old_image && $new_image) {
                Storage::disk('public')->delete($old_image);
            }
        }

        return  redirect()->route('admin.blog_artical.index');
    }
    public function delete(Request $request){
        $artical = Artical::findOrFail($request->id);
        $artical->delete();
        // $artical->truncate();
        return  redirect()->route('admin.blog_artical.index');
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return;
        } else {
            $file = $request->file('image');
            $path = $file->store('articals', [
                'disk' => 'public',
            ]);
            return $path;
        }
    }
}
