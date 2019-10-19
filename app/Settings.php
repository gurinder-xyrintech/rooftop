<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model
{
    use SoftDeletes;
    
    Protected $fillable = [
        "category",
        "key",
        "value",
    ];

    protected $casts = [
        "category"          =>  "string",
        "key"               =>  "string",
        "value"             =>  "string",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
