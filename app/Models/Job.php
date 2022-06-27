<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    use HasFactory;

    protected $fillable =['owner_id','title' , 'location' , 'industry', 'start_date', 'description'];

    public function industry()
    {
        return $this->belongsTo(Industry::class); //later will be used for reporting the industry in which the job is involved in
    }

    public function photo()
    {
        return $this->hasOne(JobImage::class);
    }

    public function owner()
    {
        return $this->hasOne(User::class);
    }
}
