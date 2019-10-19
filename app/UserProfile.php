<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'birthdate',
        'gender',
        'phone',
        'address',
        'profile_url'
    ];

    protected $cast = [
        'birthdate'         =>  'date',
        'phone'             =>  'string',
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
