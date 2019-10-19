<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use SoftDeletes;
    
    protected $fillable =   [
        "email",
        "firstname",
        "lastname",
    ];

    protected $casts = [
        "email"             =>  "string",
        "firstname"         =>  "string",
        "lastname"          =>  "string",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
