<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vocabulary extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'description'
    ];

    protected $casts = [
        "name"              =>  "string",
        "description"       =>  "text",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
