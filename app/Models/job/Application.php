<?php

namespace App\Models\job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = "applications";

    protected $fillable = [
        'id',
        'job_id',
        'user_id',
        'cv',
        'job_title',
        'job_region',
        'company',
        'job_type',
        'job_image',
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;
}
