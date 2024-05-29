<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nav;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



class NavController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth.type:admin');
    }
    public function index()
    {
        $navs = Nav::get();
        // dd($general_settings->image_url);
        return view('admin.nav.index', compact('navs'));
    }
    public function edit($id)
    {
        $navs = Nav::get();
        $general_settings = Nav::findOrFail($id);
        return view('admin.nav.edit', compact(['general_settings' , 'navs']));
    }
    public function store(Request $request)
    {

        $request->validate([
            'name_en' => "required|string|max:255|min:3",
            "name_ar" => "required|string|max:255|min:3",
            "description_en" => "required",
            "description_ar" => "required",
        ]);
        // dd($request->all());
        // $setting = GeneralSetting::first();
        // $old_image = $setting->logo;
        // $data = $request->except('logo');
        $new_image = $this->uploadImage($request);

        // if ($new_image) {
        //     $data['image'] = $new_image;
        // }
        // dd($new_image);
        Nav::create([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            'parent_id'      => $request->parent_id,
            "logo" => $new_image ?? "null",
        ]);
        // if ($old_image && $new_image) {
        //     Storage::disk('public')->delete($old_image);
        // }
        return redirect()->route('admin.nav')->with('success', "{{  __('admin/general.update') }}");
    }
    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'name_en' => "required|string|max:255|min:3",
        //     "name_ar" => "required|string|max:255|min:3",
        //     "description_en" => "required",
        //     "description_ar" => "required",
        // ]);
        // dd($request->all());
        $setting =  Nav::findOrFail($id);
        $old_image = $setting->logo;
        $data = $request->except('logo');
        $new_image = $this->uploadImage($request);

        if ($new_image) {
            $data['image'] = $new_image;
        }
        // dd($new_image);
        $setting->update([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "logo" => $new_image ?? $old_image,
            'parent_id'      => $request->parent_id,
        ]);
        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('admin.nav')->with('success', "{{  __('admin/general.update') }}");
    }


    public function delete($id)
    {
        $artical = Nav::findOrFail($id);
        $artical->delete();
        return  redirect()->route('admin.nav');
    }


    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('logo')) {
            return;
        } else {
            $file = $request->file('logo');
            $path = $file->store('main_nav', [
                'disk' => 'public',
            ]);
            return $path;
        }
    }
}
