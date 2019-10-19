<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "receiver_id",
        "name",
        "email",
        "phone",
        "subject",
        "body",
        "readed",
    ];

    protected $casts = [
        "receiver_id"   =>  "integer",
        "name"          =>  "string",
        "email"         =>  "string",
        "phone"         =>  "string",
        "subject"       =>  "string",
        "body"          =>  "text",
        "readed"        =>  "integer",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
