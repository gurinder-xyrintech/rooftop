<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "name",
        "description",
        "versions_data",
    ];

    protected $casts = [
        "name"          =>  "string",
        "description"   =>  "string",
        "versions_data" =>  "string",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
