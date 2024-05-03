<?php

namespace App\Http\Controllers\moderator;

use App\Models\ListSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ListSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.type:moderator');
    }
    public function index()
    {
        $list_settings = ListSetting::first();
        // dd($general_settings->image_url);
        return view('moderator.list_settings.index' , compact('list_settings'));
    }
    public function edit()
    {
    $list_settings = ListSetting::first();
    return view('moderator.list_settings.edit' , compact('list_settings'));
}
    public function update(Request $request){
        // 'facebook', 'x', 'linked_in', 'instagram', 'phone', 'email'
        $request->validate([
            'facebook' => "required|string|max:255",
            "x" => "required|string|max:255",
            "linked_in" => "required",
            "instagram" => "required",
            "phone" => "required",
            "email" => "required",
        ]);
        // dd($request->all());
        $setting = ListSetting::first();

        // dd($new_image);
        $setting->update($request->all());
        // $setting->update([
        //     "webname_en" => $request->webname_en,
        //     "webname_ar" => $request->webname_ar,
        //     "description_en" => $request->description_en,
        //     "description_ar" => $request->description_ar,
        //     "logo" => $new_image ?? $old_image ,
        // ]);

        return redirect()->route('moderator.list_settings')->with('success' ,"{{  __('admin/general.update') }}");
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
