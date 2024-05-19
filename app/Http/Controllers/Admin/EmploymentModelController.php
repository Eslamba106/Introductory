<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\EmploymentModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EmploymentModelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.type:admin');
    }
    public function index()
    {
        // $jobs
        return view('admin.employment.index');
    }
    public function store(Request $request)
    {
        // 'name', 'phone', 'email', 'attachments'
        $request->validate([
            'name'             => "required|string|max:255|min:3",
            'phone'       => "required",
            "email"           => "required|email",
            "attachments"           => "required",
        ]);
        if ($request->attachments) {

            $path = $this->uploadImage($request);
        }

        $jobModel = EmploymentModel::create([
            "name"           => $request->feature,
            "phone"          => $request->category,
            "email"            => $request->status,
            "attachments"            => $path ?? null,
        ]);
        return route('admin.job_model');
    }

    public function edit($id)
    {

        $job_model = EmploymentModel::findOrFail($id);
        return view('admin.job_model.edit', compact('job_model'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'              => "required|string|max:255|min:3",
            'phone'             => "required",
            "email"             => "required|email",
            // "attachments"       => "required",
        ]);
        $job_model = EmploymentModel::findOrFail($id);

        $new_image = $this->uploadImage($request);
        $old_image = $job_model->image;
        if ($new_image) {
            $image = $new_image;
        } else {
            $image = $old_image;
        }

        $job_model->update([
            "name"           => $request->feature,
            "phone"          => $request->category,
            "email"            => $request->status,
            "attachments"            => $image ?? null,
        ]);
        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }
        return  redirect()->route('admin.job_model');
    }
    public function delete(Request $request)
    {
        $job = EmploymentModel::findOrFail($request->id);
        $job->delete();
        return  redirect()->route('admin.job_model');
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
