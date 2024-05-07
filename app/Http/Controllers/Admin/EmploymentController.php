<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employment;
use Illuminate\Http\Request;
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
            "feature"           => "required",
            "category"           => "required",
            "status"           => "required",
        ]);
        if($request->image){

            $path = $this->uploadImage($request);
        }

        $job = Employment::create([
            'title'             => $request->title,
            'description'       => $request->description,
            "feature"           => $request->feature,
            "category"          => $request->category,
            "status"            => $request->status,
            "image"            => $path ?? null,
        ]);
        return redirect()->route('admin.job');
    }

    public function edit($id){

        $job = Employment::findOrFail($id);
        return view('admin.job.edit' , compact('job'));
    }

    public function update(Request $request , $id){

        $request->validate([
            'title'             => "required|string|max:255|min:3",
            'description'       => "required",
            "feature"           => "required",
            "category"           => "required",
            "status"           => "required",
        ]);
        $job = Employment::findOrFail($id);

        $new_image = $this->uploadImage($request);
        $old_image = $job->image;
        if ($new_image) {
            $image = $new_image;
        }else{
            $image = $old_image;
        }

        $job->update([
            'title'             => $request->title,
            'description'       => $request->description,
            "feature"           => $request->feature,
            "category"          => $request->category,
            "status"            => $request->status,
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
