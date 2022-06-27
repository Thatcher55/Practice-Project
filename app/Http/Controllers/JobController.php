<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobImage;
use App\Models\User;
use App\Http\Controllers\ImageController;

class JobController extends Controller
{
    public function index()
    {
            $jobs = Job::all()->load('photo');
            return view('jobs', [
                'jobs' => $jobs,
            ]);
    }
    public function viewJob(Job $job)
    {
        return view('job', [
                'job' => $job //this calls to the class of post thats responsible for finding the correct view
            ]);
    }

    public function searchJobs(Request $request)
    {
        $jobs = Job::query()
            ->where('industry', 'like', '%' . $request->input('search') . '%')
            ->get();
        return view('jobs', [
            'jobs' => $jobs
        ]);
//        return response()->json($jobs);
    }


    public function currentJobs()
    {
        $id=Auth::user()->id;
        $jobs = Job::query()
            ->where('job_owner', '%' . 'id' .'%')
            ->get();
        return view('jobs',[
            'jobs' => $jobs
        ]);
    }


}
