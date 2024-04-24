<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Artical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        $articals = Artical::paginate();
        $departments = Blog::all();
        return view('admin.artical.index', compact(['articals' , 'dapartments']));
    }

    public function store(Request $request)
    {
        $admin = auth()->guard('admin')->user();
        // $moderator = auth()->user();
        // if($admin != null){
        $writer = $admin->id;
        $writer_type = "admin";
        // }
        // elseif($moderator != null){
        //     $writer = $moderator->id;
        //     $writer_type = "moderator";
        // }
        $request->validate([
            "title" => "required|string|max:255",
            "content" => "required",
            "image" => "mimes:png,jpg",
            "status" => "required",
            "artical_id" => "required",
        ]);
        $path = $this->uploadImage($request);
        Artical::create([
            "title" => $request->title,
            "content" => $request->content,
            "status" => $request->status,
            "artical_id" => $request->artical_id,
            "writer" => $writer,
            "writer_type" => $writer_type,
            "image" => $path,
        ]);
        return  redirect()->route('admin.blog_artical.index');
    }
    public function update(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "content" => "required",
            "image" => "mimes:png,jpg",
            "status" => "required",
            "artical_id" => "required",
        ]);
        $artical = Artical::findOrFail($request->id);
        if ($artical->writer_type == "admin") {
            $new_image = $this->uploadImage($request);
            $old_image = $artical->image;
            if ($new_image) {
                $image = $new_image;
            }
            Artical::create([
                "title" => $request->title,
                "content" => $request->content,
                "status" => $request->status,
                "artical_id" => $request->artical_id,
                "writer" => $artical->writer,
                "writer_type" => $request->writer_type,
                "image" => $image,
            ]);
            if ($old_image && $new_image) {
                Storage::disk('public')->delete($old_image);
            }
        }

        return  redirect()->route('admin.blog_artical.index');
    }
    public function delete($id){
        $artical = Artical::findOrFail($id);
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
