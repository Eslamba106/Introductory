<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmploymentModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EmploymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.type:admin');
    }
    public function index(){

        $jobs = Employment::paginate();
        return view('admin.job.index' , compact('jobs'));
    }
    public function store(Request $request){
        //, , '', 'feature', 'category', 'status'
        $request->validate([
            'title'             => "required|string|max:255|min:3",
            'description'       => "required",
            "count"           => "required|integer",
            "category"           => "required",
            "status"           => "required",
        ]);
        if($request->image){

            $path = $this->uploadImage($request);
        }
        $slug = Str::slug($request->title.rand(1,1000) , '_');
        $job = Employment::create([
            'title'             => $request->title,
            'slug'             => $slug,
            'description'       => $request->description,
            "features"           => $request->features,
            "category"          => $request->category,
            "status"            => $request->status,
            "count"            => $request->count,
            "image"            => $path ?? null,
        ]);
        return redirect()->route('admin.job');
    }

    public function edit($id){

        $job = Employment::findOrFail($id);
        return view('admin.job.edit' , compact('job'));
    }
    public function show($id){
        $job = Employment::findOrFail($id);
        $applications = EmploymentModel::where('job_code' , $job->slug)->get();
        
        return view('admin.job.show' , compact(['job' , 'applications']));
    }

    public function update(Request $request , $id){

        $request->validate([
            'title'             => "required|string|max:255|min:3",
            'description'       => "required",
            "count"             => "required|integer",
            "category"          => "required",
            "status"            => "required",
        ]);
        $job = Employment::findOrFail($id);
        $slug = Str::slug($request->title.rand(1,1000) , '_');

        $new_image = $this->uploadImage($request);
        $old_image = $job->image;
        if ($new_image) {
            $image = $new_image;
        }else{
            $image = $old_image;
        }

        $job->update([
            'title'             => $request->title,
            'slug'             => $slug,
            'description'       => $request->description,
            "features"           => $request->features,
            "category"          => $request->category,
            "status"            => $request->status,
            "count"            => $request->count,
            "image"            => $image ?? null,
        ]);
        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }
        return  redirect()->route('admin.job');

    }
    public function delete(Request $request){
        $job = Employment::findOrFail($request->id);
        $job->delete();
        return  redirect()->route('admin.job');
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
