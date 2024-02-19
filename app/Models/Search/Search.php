<?php

namespace App\Models\Search;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;
    protected $table = "searches";

    protected $fillable = [
        'id',
        'keyword',
        'createdAt',
        'updatedAt',
    ];
    public $timestamps = true;
}
