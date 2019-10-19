<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderBilling extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "order_id",
        "street",
        "state",
        "city",
        "zip",
        "lat",
        "lon",
        "firstname",
        "lastname",
        "cardtype",
        "cardnumber",
        "cardmonth",
        "cardyear",
        "code",
        "promotion_code",
    ];

    protected $casts = [
        "order_id"          =>  "integer",
        "street"            =>  "string",
        "state"             =>  "string",
        "city"              =>  "string",
        "zip"               =>  "string",
        "lat"               =>  "string",
        "lon"               =>  "string",
        "firstname"         =>  "string",
        "lastname"          =>  "string",
        "cardtype"          =>  "string",
        "cardnumber"        =>  "integer",
        "cardmonth"         =>  "integer",
        "cardyear"          =>  "integer",
        "code"              =>  "string",
        "promotion_code"    =>  "string",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
