<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Block extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "region",
        "type",
        "order",
        "title",
        "params",
    ];

    protected $casts = [
        "region"        =>  "string",
        "type"          =>  "string",
        "order"         =>  "integer",
        "title"         =>  "string",
        "params"        =>  "text",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
    