<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignReport extends Model
{
    use SoftDeletes;
    
    protected $fillable =   [
        "status",
        "report_file",
        "document_file"
    ];

    protected $casts = [
        "status"    =>  "string",
        "report_file"   =>  "text",
        "document_file" =>  "string",
        "created_at"    =>  "datetime",
        "updated_at"    =>  "datetime",
        "deleted_at"    =>  "datetime",
    ];
}
