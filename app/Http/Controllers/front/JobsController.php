<?php

namespace App\Http\Controllers\front;

use Carbon\Carbon;
use App\Mail\VerifyEmail;
use App\Models\Employment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmploymentModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailVerificationNotification;

class JobsController extends Controller
{
    public function index()
    {

        $jobs = Employment::paginate(6);

        return view('front.jobs', compact('jobs'));
    }
    public function application($slug)
    {


        $job = Employment::where('slug', $slug)->first();

        return view('front.job_application', compact('job'));
    }
    public function store(Request $request)
    {

        $code = Str::slug($request->name . rand(1, 1000), '_');
        $verify_code = rand(100000, 999999);
        if ($request->attachments) {

            $path = $this->uploadImage($request);
        }

        $jobModel = EmploymentModel::create([
            "application_code"      => $code,
            "name"                  => $request->name,
            "phone"                 => $request->phone,
            "job_code"              => $request->slug,
            "email"                 => $request->email,
            "verify_code"           => $verify_code,
            "attachments"           => $path ?? null,
        ]);
        Mail::to($request->email)->send(new VerifyEmail($verify_code));
        // dd($code);
        return view('front.verifyemail' , compact(['code']));
    }

    // public function verifyEmailView()
    // {

    //     $job = EmploymentModel::where('application_code', $request->code)->first();

    // }
    public function verifyEmail(Request $request)
    {

        $job = EmploymentModel::where('application_code', $request->code)->first();
        $code = $request->code;
        if ($request->verify_code == $job->verify_code) {
            $job->update([
                'email_verified_at' => Carbon::now(),
            ]);
            return redirect()->route('jobs')->with('success', 'Your Email Verified');
        } else {
            return redirect()->route('jobs')->with('fail', "Your Code Is Incorrect");
            // return view('front.verifyemail' , compact('code'))->with('fail', "Your Code Is Incorrect");
        }
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
