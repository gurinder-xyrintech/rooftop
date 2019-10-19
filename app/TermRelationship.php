<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermRelationship extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "node_id",
        "term_id",
    ];

    protected $casts = [
        "node_id"           =>  "integer",
        "term_id"           =>  "integer",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime", 
    ];
}
