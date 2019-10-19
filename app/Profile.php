<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "user_id",
        "firstname",
        "lastname",
        "cardtype",
        "cardnumber",
        "cardmonth",
        "cardyear",
        "code",
        "email",
        "phone1",
        "phone2",
        "company",
        "street",
        "district",
        "city",
        "state",
        "zipcode",
        "promotion_code",
        "customer_notes",
        "extended_price",
        "standard_price",
        "claims_price",
    ];

    protected $casts = [
        "user_id"           =>  "integer",
        "firstname"         =>  "string",
        "lastname"          =>  "string",
        "cardtype"          =>  "string",
        "cardnumber"        =>  "integer",
        "cardmonth"         =>  "integer",
        "cardyear"          =>  "integer",
        "code"              =>  "string",
        "email"             =>  "string",
        "phone1"            =>  "string",
        "phone2"            =>  "string",
        "company"           =>  "string",
        "street"            =>  "string",
        "district"          =>  "string",
        "city"              =>  "string",
        "state"             =>  "string",
        "zipcode"           =>  "string",
        "promotion_code"    =>  "string" ,
        "customer_notes"    =>  "text",
        "extended_price"    =>  "integer",
        "standard_price"    =>  "integer",
        "claims_price"      =>  "integer",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
