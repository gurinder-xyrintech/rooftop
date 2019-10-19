<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "name",
        "price",
        "brick_price",
        "quantity",
        "image",
        "measurement_summary",
        "roof_photo",
        "logo_customization",
        "length_measutements",
        "pitch_measurements",
        "area_measurements",
        "waste_calculation_tables",
        "notes_oage",
        "editable_format",
        "estimation_software_compatibility",
        "delivery",
        "report_length",
        "common_users",
    ];

    protected $casts = [
        "name"                              =>  "string",
        "price"                             =>  "float",
        "brick_price"                       =>  "float",
        "quantity"                          =>  "integer",
        "image"                             =>  "string",
        "measurement_summary"               =>  "boolean",
        "roof_photo"                        =>  "boolean",
        "logo_customization"                =>  "boolean",
        "length_measutements"               =>  "boolean",
        "pitch_measurements"                =>  "boolean",
        "area_measurements"                 =>  "boolean",
        "waste_calculation_tables"          =>  "boolean",
        "notes_oage"                        =>  "boolean",
        "editable_format"                   =>  "boolean",
        "estimation_software_compatibility" =>  "integer",
        "delivery"                          =>  "string",
        "report_length"                     =>  "string",
        "common_users"                      =>  "text",
        "created_at"                        =>  "datetime",
        "updated_at"                        =>  "datetime",
        "deleted_at"                        =>  "datetime",
    ];
}
