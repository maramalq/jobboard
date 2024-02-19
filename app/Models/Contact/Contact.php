<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = "contacts";

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'subject',
        'message',
        'createdAt',
        'updatedAt',
    ];
    public $timestamps = true;
}
