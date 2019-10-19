<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailTemplate extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "name",     
        "help",
        "body",
        "subject",
    ];

    protected $casts = [
        "name"      =>  "string",
        "help"      =>  "text",
        "body"      =>  "text",
        "subject"   =>  "string",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
