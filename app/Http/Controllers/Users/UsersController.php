<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\job\Application;
use App\Models\job\JobSaved;
use Auth;
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
}
