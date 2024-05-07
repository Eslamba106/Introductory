<?php

namespace App\Http\Controllers\moderator;

use App\Models\Knowledge;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KnowledgeCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KnowledgeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.type:moderator');
    }
    public function index() //Request $request
    {

        $request = request();
        $query = Knowledge::query();
        $title = $request->query('title');

        // dd($title);
        if($title){
           $query->where('title' , 'like','%'.$title.'%');
        }
        $knowledge_category_id =  $request->query('department');
        if( $knowledge_category_id){

            $query->where('knowledge_category_id' , $knowledge_category_id);
        }
        $knowledge = $query->paginate();
        $departments = KnowledgeCategory::all();


        return view('moderator.knowledge_center.index', compact(['knowledge' , 'departments']));
    }

    public function store(Request $request)
    {
   
        $request->validate([
            "title" => "required|string|max:255",
            "content" => "required",
            // "image" => "mimes:png,jpg",
            "knowledge_category_id" => "required",
        ]);    
        $slug = Str::slug($request->title, '-');
        $path = $this->uploadImage($request);
        Knowledge::create([
            "title" => $request->title,
            "content" => $request->content,
            "knowledge_category_id" => $request->knowledge_category_id ,
            "image" => $path,
            "slug" => $slug,
            'tags' => $request->tags,
        ]);
        return  redirect()->route('user.knowledge_center.index');
    }

    public function edit($id)
    {

        $knowledge = Knowledge::findOrFail($id);
        $tags = json_decode($knowledge->tags);
        $departments = KnowledgeCategory::all();
        return view('moderator.knowledge_center.edit', compact(['knowledge' , 'departments' , 'tags']));
    }
    public function show($id)
    {

        $knowledge = Knowledge::findOrFail($id);
        $tags = json_decode($knowledge->tags);
        $department = KnowledgeCategory::where('id' , $knowledge->knowledge_category_id)->first();
        return view('moderator.knowledge_center.show', compact(['knowledge' , 'tags' , 'department']));
    }
    public function update(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "content" => "required",
            "knowledge_category_id" => "required",
        ]);
        $knowledge = Knowledge::findOrFail($request->id);
            $new_image = $this->uploadImage($request);
            $old_image = $knowledge->image;
            if ($new_image) {
                $image = $new_image;
            }else{
                $image = $old_image;
            }
            $slug = Str::slug($request->title, '-');

            $knowledge->update([
                "title" => $request->title,
                "content" => $request->content,
                "knowledge_category_id" => $request->knowledge_category_id,
                "image" => $image,
                "slug" => $slug,

            ]);
            if ($old_image && $new_image) {
                Storage::disk('public')->delete($old_image);
            }
        
        return  redirect()->route('user.knowledge_center.index');
    }
    public function delete(Request $request){
        $knowledge = Knowledge::findOrFail($request->id);
        $knowledge->delete();
        Storage::disk('public')->delete($knowledge->image);
        return  redirect()->route('user.knowledge_center.index');
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return "Not Has File";
        } else {
            $file = $request->file('image');
            $path = $file->store('knowledge_center', [
                'disk' => 'public',
            ]);
            return $path;
        }
    }
}

