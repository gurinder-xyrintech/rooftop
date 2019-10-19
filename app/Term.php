<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use SoftDeletes;
    
    protected $fillable =   [
        "vocabulary_id",
        "parent_id",
        "root",
        "lft",
        "rght",
        "level",
        "name",
        "description",
        "params",
        "total_item",
    ];

    protected $casts = [
        "vocabulary_id" =>  "integer",
        "parent_id"     =>  "integer",
        "root"          =>  "integer",
        "lft"           =>  "integer",
        "rght"          =>  "integer",
        "level"         =>  "integer",
        "name"          =>  "string",
        "description"   =>  "text",
        "params"        =>  "text",
        "total_item"    =>  "integer",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
