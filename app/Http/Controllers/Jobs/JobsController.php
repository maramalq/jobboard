<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\job\job;
use App\Models\job\JobSaved;
use App\Models\job\Application;
use App\Models\Category\Category;
use App\Models\Search\Search;
use Auth;

class JobsController extends Controller
{
    public function single($id)
    {
        $job = Job::find($id);
        //getting related Jobs
        $relatedJobs = Job::where("category", $job->category)
            ->where("id", '!=', $id)
            ->take(5)
            ->get();
        $relatedJobsCount = Job::where("category", $job->category)
            ->where("id", '!=', $id)
            ->take(5)
            ->count();

        $categories = Category::all();

        if(auth()->user()) {
            $savedJob = JobSaved::where('job_id', $id)
                ->where('user_id', Auth::user()->id)
                ->count();

            $appliedJob = Application::where('job_id', $id)
                ->where('user_id', Auth::user()->id)
                ->count();

            return view("jobs.single", compact("job", "relatedJobs", "relatedJobsCount", "savedJob", "appliedJob", "categories"));

        } else {    
            return view("jobs.single", compact("job", "relatedJobs", "relatedJobsCount", "categories"));

        }

    }

    public function saveJob(Request $request)
    {

        $saveJob = JobSaved::create([
            'job_id' => $request->job_id,
            'user_id' => Auth::user()->id,
            'job_image' => $request->job_image,
            'job_title' => $request->job_title,
            'job_region' => $request->job_region,
            'job_type' => $request->job_type,
            'job_company' => $request->job_company,
        ]);
        if ($saveJob) {
            return redirect('/jobs/single/' . $request->job_id . '')->with('save', 'job saved successfully');
        }
    }
    public function jobApply(Request $request)
    {
        if (Auth::user()->cv == 'No CV') {
            return redirect('/jobs/single/' . $request->job_id . '')->with('apply', 'upload your cv first in the profile page');
        } else {
            $applyJob = Application::create([
                'job_id' => $request->job_id,
                'user_id' => Auth::user()->id,
                'cv' => Auth::user()->cv,
                'job_title' => $request->job_title,
                'job_region' => $request->job_region,
                'job_image' => $request->job_image,
                'job_type' => $request->job_type,
                'company' => $request->company,
            ]);
            if ($applyJob) {
                return redirect('/jobs/single/' . $request->job_id . '')->with('applied', 'you applied this job successfully');
            }

        }
    }
    public function search(Request $request)
    {

        $request->validate([
            "job_title" => "required",
            "job_region" => "required",
            "job_type" => "required",
        ]);

        Search::Create([
            "keyword" => $request->job_title,
        ]);

        $job_title = $request->get('job_title');
        $job_region = $request->get('job_region');
        $job_type = $request->get('job_region');
        
        $searches = Job::select()->where('job_title', 'like', "%$job_title%")
                                ->where('job_region', 'like', "%$job_region%")
                                ->where('job_type', 'like', "%$job_type%")
                                ->get();
        
        return view('jobs.search', compact('searches'));
    }
}