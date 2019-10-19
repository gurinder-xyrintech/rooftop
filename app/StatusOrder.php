<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusOrder extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "keyword",
        "key_id",
        "name",
        "help",
    ];

    protected $casts = [
        "keyword"           =>  "string",
        "key_id"            =>  "integer",
        "name"              =>  "string",
        "help"              =>  "string",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
