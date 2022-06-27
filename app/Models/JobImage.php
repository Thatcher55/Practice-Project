<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Http\Controllers\JobController;

class JobImage extends Model
{
    use HasFactory;

    public static function get($id)
    {
        return JobImage::where('id', $id);
    }

}
