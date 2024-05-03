<?php

namespace App\Http\Controllers\moderator;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.type:moderator');
    }
    public function index(){

        $pages = Page::paginate();
        return view('moderator.pages.index' , compact('pages'));
    }
    public function create(){
        return view('moderator.pages.create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
        ]);

        $slug = Str::slug($request->title.rand(1,1000) , '_');
        $page = Page::create([
            'slug' => $slug,
            'title' => $request->title,
            'content' => $request->content,
            'tags' => $request->tags,
        ]);
        return redirect()->route('moderator.page.index');
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
        return view('moderator.pages.show' , compact(['page' , 'tags']));
    }
    public function destroy($slug){
        // $page = Page::where('slug' , $slug)->first();
        $page = Page::where('slug' , $slug)->first();
        $page->delete();
        return back()->with('success' ,"{{  __('page-delete') }}");
    }
}
