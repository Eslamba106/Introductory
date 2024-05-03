<?php

namespace App\Http\Controllers\moderator;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
    
class GeneralSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.type:moderator');
    }
    public function index()
    {
        $general_settings = GeneralSetting::first();
        // dd($general_settings->image_url);
        return view('moderator.general_settings.index' , compact('general_settings'));
    }
    public function edit()
    {
    $general_settings = GeneralSetting::first();
    return view('moderator.general_settings.edit' , compact('general_settings'));
}
    public function update(Request $request){
        
        $request->validate([
            'webname_en' => "required|string|max:255|min:3",
            "webname_ar" => "required|string|max:255|min:3",
            "description_en" => "required",
            "description_ar" => "required",
        ]);
        // dd($request->all());
        $setting = GeneralSetting::first();
        $old_image = $setting->logo;
        $data = $request->except('logo');
        $new_image = $this->uploadImage($request);

        if ($new_image) {
            $data['image'] = $new_image;
        }
        // dd($new_image);
        $setting->update([
            "webname_en" => $request->webname_en,
            "webname_ar" => $request->webname_ar,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "logo" => $new_image ?? $old_image ,
        ]);
        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('moderator.settings')->with('success' ,"{{  __('admin/general.update') }}");
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('logo')) {
            return;
        } else {
            $file = $request->file('logo');
            $path = $file->store('settings', [
                'disk' => 'public',
            ]);
            return $path;
        }
    }
}
