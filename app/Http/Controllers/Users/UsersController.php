<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\job\Application;
use App\Models\job\JobSaved;
use Auth;
use File;

class UsersController extends Controller
{
    public function profile(){
        $profile = User::find(Auth::user()->id);
        return view("users.profile",compact("profile"));

    }
    public function applications(){
        $applications = Application::where('user_id', '=', Auth::user()->id)->get();
        return view("users.applications",compact("applications"));

    }
    public function savedjobs(){
        $savedJobs = JobSaved::where('user_id', '=', Auth::user()->id)->get();
        return view("users.savedjobs",compact("savedJobs"));

    }
    public function editProfile(){
        $userProfile = User::find(Auth::user()->id);
        return view("users.editProfile",compact("userProfile"));

    }
    public function updateProfile(Request $request){

        $request->validate([
            "name"=> "required|max:200",
            "job_title"=> "required|max:200",
            "bio"=> "required",
            "facebook"=> "required|max:200",
            "twitter"=> "required|max:200",
            "linkedin"=> "required|max:200",
        ]);

        $userProfileUpdate = User::find(Auth::user()->id);
        $userProfileUpdate->update([
            "name" => $request->name,
            "job_title" => $request->job_title,
            "bio" => $request->bio,
            "facebook" => $request->facebook,
            "twitter" => $request->twitter,
            "linkedin" => $request->linkedin,
        ]);
        if ($userProfileUpdate) {
            return redirect('/users/edit-profile')->with('save', 'Update user profile successfully');
        }

    }
    public function editCV(){
        $userCV = User::find(Auth::user()->id);
        return view("users.editCV",compact("userCV"));

    }
    public function updateCV(Request $request){
        // delete old cv 
        $oldCV = User::find(Auth::user()->id);

        if(File::exists(public_path('assets/cvs/'.$oldCV->cv))){
            File::delete(public_path('assets/cvs/'.$oldCV->cv));
        }else{
        }

        // add new cv
        $destinationPath = 'assets/cvs/';
        $mycv = $request->cv->getClientOriginalName();
        $request->cv->move(public_path($destinationPath), $mycv);

        $oldCV->update([
            "cv" => $mycv,
        ]);

        // success message 
        return redirect('/users/profile')->with('save', 'CV updated successfully');

    }
}
