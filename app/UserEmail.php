<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEmail extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "user_id",
        "email",
        "status",
    ];

    protected $casts = [
        "user_id"           =>  "integer",
        "email"             =>  "string",
        "status"            =>  "integer",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
