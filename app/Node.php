<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Node extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "user_id",
        "alias",
        "title",
        "content",
        "meta_title",
        "meta_keywords",
        "meta_description",
        "parent",
        "order",
        "type",
        "status",
    ];

    protected $casts = [
        "user_id"           =>  "integer",
        "alias"             =>  "string",
        "title"             =>  "string",
        "content"           =>  "text",
        "meta_title"        =>  "string",
        "meta_keywords"     =>  "string",
        "meta_description"  =>  "string" ,
        "parent"            =>  "integer",
        "order"             =>  "integer",
        "type"              =>  "string",
        "status"            =>  "integer",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
