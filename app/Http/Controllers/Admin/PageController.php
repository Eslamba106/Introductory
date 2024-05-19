<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.type:admin');
    }
    public function index(){

        $pages = Page::paginate();
        return view('admin.pages.index' , compact('pages'));
    }
    public function create(){
        return view('admin.pages.create');
    }
    public function store(Request $request){
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
            'tags' => 'required',
        ]);

        $slug = Str::slug($request->title_en.rand(1,1000) , '_');
        $page = Page::create([
            'slug' => $slug,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'content_ar' => $request->content_ar,
            'content_en' => $request->content_en,
            'tags' => $request->tags,
        ]);
        return redirect()->route('admin.page.index');
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($file , PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('pages/images') , $fileName);
            $url = asset('pages/images/'. $fileName);
            return response()->json(
                [
                    'fileName' => $fileName , 
                    'uploaded' => 1 , 
                    'url' => $url
                ]);
        }
    }

    public function show($slug){
        $page = Page::where('slug' , $slug)->first();
        $tags = json_decode($page->tags);
        // dd(gettype($tags));
        return view('admin.pages.show' , compact(['page' , 'tags']));
    }
    public function destroy($slug){
        // $page = Page::where('slug' , $slug)->first();
        $page = Page::where('slug' , $slug)->first();
        $page->delete();
        return back()->with('success' ,"{{  __('page-delete') }}");
    }
}
