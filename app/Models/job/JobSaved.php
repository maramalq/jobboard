<?php

namespace App\Models\job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSaved extends Model
{
    use HasFactory;
    protected $table = "jobsaved";

    protected $fillable = [
        'id',
        'job_id',
        'user_id',
        'job_title',
        'job_region',
        'job_company',
        'job_type',
        'job_image',
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;
}
