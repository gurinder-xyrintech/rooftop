<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocode extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "type",
        "code",
        "title",
        "description",
        "title_slug",
        "prefix",
        "discount_type",
        "discount",
        "discount_applies_on",
        "type_of_report",
        "min_reports_purchased",
        "report_based_on",
        "min_reports_count",
        "reports_purchased_condition",
        "start_date",
        "end_date",
        "noExpiry",
        "usage_limit_type",
        "usage_limit",
        "limit_per_user",
        "limit",
        "applies_on_brick",
        "status",
        "expired",
        "order_id",
    ];

    protected $casts = [
        "type"                          =>  "string",
        "code"                          =>  "string",
        "title"                         =>  "string",
        "description"                   =>  "text",
        "title_slug"                    =>  "string",
        "prefix"                        =>  "string",
        "discount_type"                 =>  "string",
        "discount"                      =>  "integer",
        "discount_applies_on"           =>  "string",
        "type_of_report"                =>  "string",
        "min_reports_purchased"         =>  "integer",
        "report_based_on"               =>  "string",
        "min_reports_count"             =>  "integer",
        "reports_purchased_condition"   =>  "string",
        "start_date"                    =>  "datetime",
        "end_date"                      =>  "datetime",
        "noExpiry"                      =>  "integer",
        "usage_limit_type"              =>  "string",
        "usage_limit"                   =>  "integer",
        "limit_per_user"                =>  "integer",
        "limit"                         =>  "integer",
        "applies_on_brick"              =>  "integer",
        "status"                        =>  "boolean",
        "expired"                       =>  "datetime",
        "order_id"                      =>  "integer",
        "created_at"                    =>  "datetime",
        "updated_at"                    =>  "datetime",
        "deleted_at"                    =>  "datetime",
    ];
}
