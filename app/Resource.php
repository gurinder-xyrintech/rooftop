<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "user_id",
        "name",
        "description",
        "path",
        "type",
        "where",
    ];

    protected $casts = [
        "user_id"       =>  "integer",
        "name"          =>  "string",
        "description"   =>  "text",
        "path"          =>  "string",
        "type"          =>  "string",
        "where"         =>  "string",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
