<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brick extends Model
{
    use SoftDeletes;
    
    protected $fillable =   [
        "report_type_id",
        "quantity",
        "price",
    ];

    protected $casts = [
        "report_type_id"    =>  "integer",
        "quantity"          =>  "integer",
        "price"             =>  "float",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];

    //Relationships
    public function reportType()
    {
        return $this->belongsTo(ReportType::class);
    }

    //Validation rules
    public static function validationRules($request, $prefix)
    {   
        $rules = [
           $prefix."quantity"  =>  ["required", "numeric"],
           $prefix."price"     =>  ["required", "numeric"]
        ];
        
        return $rules;
    }

    public static function store($request, $report)
    {   
        $records = collect();
            foreach($request as $_request){
                if(isset($_request['id'])){
                    $records = $report->bricks()
                                    ->where('id', $_request["id"])
                                    ->get();
                }
                
                    if($records->count()){
                        $record = $records->first();
                    }else{
                        $record = new Brick();
                    }
                
                $record->reportType()->associate($report);
        
                $record->fill($_request)->save();
        }
        
        
    }

}
