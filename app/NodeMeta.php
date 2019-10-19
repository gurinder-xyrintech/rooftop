<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NodeMeta extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "node_id",
        "meta_key",
        "meta_value",
    ];

    protected $casts = [
        "node_id"       =>  "integer",
        "meta_key"      =>  "string",
        "meta_value"    =>  "text",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
