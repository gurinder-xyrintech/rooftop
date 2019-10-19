<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "userwebsite",
        "username",
        "useremail",     
        "parent",
        "title",
        "content",
        "type",
        "status",
        "level",
        "lft",
        "rght",
        "ip"
    ];

    protected $casts = [
        "userwebsite"   =>  "string",
        "username"      =>  "string",
        "useremail"     =>  "string",
        "parent"        =>  "integer",
        "title"         =>  "string",
        "content"       =>  "text",
        "type"          =>  "string",
        "status"        =>  "boolean",
        "level"         =>  "integer",
        "lft"           =>  "integer",
        "rght"          =>  "integer",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
