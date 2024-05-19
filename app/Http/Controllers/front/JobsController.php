<?php

namespace App\Http\Controllers\front;

use App\Models\Employment;
use Illuminate\Http\Request;
use App\Models\EmploymentModel;
use App\Http\Controllers\Controller;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Support\Facades\Notification;
class JobsController extends Controller
{
    public function index(){

        $jobs = Employment::paginate(6);
        
        return view('front.jobs' , compact('jobs'));
    }
    public function application($slug){

        
        $job = Employment::where('slug' , $slug)->first();
        
        return view('front.job_application' , compact('job'));
    }
    public function store(Request $request){

        
        if ($request->attachments) {

            $path = $this->uploadImage($request);
        }

        $jobModel = EmploymentModel::create([
            "name"           => $request->name,
            "phone"          => $request->phone,
            "app_code"          => $request->slug,
            "email"            => $request->email,
            "attachments"            => $path ?? null,
        ]);
        // $jobModel->notify(new EmailVerificationNotification());
        // Notification::send($jobModel, new EmailVerificationNotification());
        return view('front.jobs');
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
