<?php

namespace App;

use App\Brick;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportType extends Model
{
    use SoftDeletes;
    
    protected $fillable =   [
        "type" ,
        "price",
    ];

    protected $casts = [
        "type"              =>   "string",
        "price"             =>   "float",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];

    //Relationships
    public function bricks()
    {
        return $this->hasMany(Brick::class);
    }

    //Validation rules
    public static function validationRules($request)
    {
        //Rules for report type
        $must_have_rules = collect([
            "type"  =>  ["required"],
            "price" =>  ["required", "numeric"]
        ]);
       
        //Validate brick if its set
        if(isset($request['brick']) && !empty($request['brick'])){
            $must_have_rules = $must_have_rules->merge(Brick::validationRules($request->brick, "brick.*"));
        }
        
        return $must_have_rules->toArray();
    }

    //Store
    public static function store($request, $report = null)
    {   
        if($report == null){
            $report = new ReportType();
        }

        $report->fill($request->all())->save();
        
        $report->associateRelationships($request, $report);
        
        return $report;
    }

    public function associateRelationships($request, $report)
    {  
       if(isset($request['brick'])){
           Brick::Store($request['brick'], $report);
        }
    }

    //Update
    public function updateReportType($request)
    {
        return self::store($request, $this);
    }

}
