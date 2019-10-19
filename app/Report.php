<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "name",
        "sender_id",
        "receiver_id",
        "subject",
        "body",
        "readed",
    ];

    protected $cast = [
        "name"          =>  "string",
        "sender_id"     =>  "integer",
        "receiver_id"   =>  "integer",
        "subject"       =>  "string",
        "body"          =>  "text",
        "readed"        =>  "boolean",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
