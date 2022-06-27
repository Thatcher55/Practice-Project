<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobImage;
use App\Models\Job;
use App\Http\Controllers\JobController;

class ImageController extends Controller
{
    //Add image
    public function addImage(){
        return view('add_image');
    }
    //Store image
    public function storeImage(Request $request){
        $data= new JobImage();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('./public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
    }
    //View image
    public function viewImage(){
        return view('view_image');
    }

//    public function find(Job $job)
//    {
//        $id = $job->id;
//        return JobImage::where('id', $id);
//    }
}
