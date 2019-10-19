<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryBrick extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "user_id",
        "package",
        "brick_price",
        "quantity",
        "remaining",
        "type",
        "status",
        "refund_price",
        "payment_params",
        "refund_params",
    ];

    protected $casts = [
        "user_id"           =>  "integer",
        "package"           =>  "integer",
        "brick_price"       =>  "integer",
        "quantity"          =>  "integer",
        "remaining"         =>  "integer",
        "type"              =>  "string",
        "status"            =>  "string",
        "refund_price"      =>  "float",
        "payment_params"    =>  "text",
        "refund_params"     =>  "text",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
