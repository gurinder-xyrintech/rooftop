<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportFile extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "order_id",
        "report_file",
    ];

    protected $casts = [
        "order_id"          =>  "integer",
        "report_file"       =>  "string",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];
}
