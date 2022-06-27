<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use App\Models\JobImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class JobCreateController extends Controller
{
        public function create()
        {
            return view('_createjob');
        }

        public function store(Request $request)
        {
            Log::info("In createController.store()");
            $attributes =  $request->validate([
                'title' => ['required'],
                'location' => ['required'],
                'industry' => ['required'],
                'start_date' => ['required'],
                'description' => ['required']
            ]);

            $attributes['owner_id'] = $request->user()->id;
//            dd($attributes['owner_id']);

            $job = Job::create($attributes);

            $id = $job->id;
            $data= new JobImage();

            if($request->file('image')){
//                Log::info("Image exists");
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
//                Log::info($filename);
                $file-> move(public_path('Image'), $filename);
                $data['image']= $filename;
                $data['job_id'] = $id; //adding specific job id to then return correct photo with correct job (hopefully)
            }else{
                $data['image'] = 'stock-image.jpg';
                $data['job_id'] = $id;
            }
            $data->save();
            return redirect('/home');
        }
}
