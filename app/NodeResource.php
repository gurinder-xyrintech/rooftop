<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NodeResource extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "node_id",
        "resource_id",
        "group",
    ];

    protected $casts = [
        "node_id"       =>  "integer",
        "resource_id"   =>  "integer",
        "group"         =>  "string",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
