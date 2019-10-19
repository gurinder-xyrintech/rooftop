<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryPhoto extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "name",
        "description",
        "alt",
        "rank",
        "file_name",
        "gallery_id"
    ];

    protected $casts = [
        "name"              =>  "string",
        "description"       =>  "text",
        "alt"               =>  "string",
        "rank"              =>  "string",
        "file_name"         =>  "string",
        "gallery_id"        =>  "integer",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
