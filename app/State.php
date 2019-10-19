<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "state_iso",
        "country_iso",
        "name",
        "ordering",
    ];

    protected $casts = [
        "state_iso"         =>  "string",
        "country_iso"       =>  "string",
        "name"              =>  "string",
        "ordering"          =>  "integer",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
