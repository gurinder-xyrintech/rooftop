<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "quantity",
        "user_id",
        "package_id",
        "delivery",
        "delivery_price",
        "comment",
        "notes",
        "to_team_note",
        "additional_emails",
        "message",
        "report_logo",
        "report_file",
        "send_report_to",
        "discount",
        "payment_gateway",
        "payment_status",
        "status",
        "refund_price",
        "type",
        "payment_params",
        "refund_params",
        "total_price",
    ];

    protected $casts = [
        "quantity"          =>  "integer",
        "user_id"           =>  "integer",
        "package_id"        =>  "integer",
        "delivery"          =>  "boolean",
        "delivery_price"    =>  "float",
        "comment"           =>  "string",
        "notes"             =>  "string",
        "to_team_note"      =>  "string",
        "additional_emails" =>  "string",
        "message"           =>  "text",
        "report_logo"       =>  "string",
        "report_file"       =>  "string",
        "send_report_to"    =>  "string",
        "discount"          =>  "float",
        "payment_gateway"   =>  "string",
        "payment_status"    =>  "boolean",
        "status"            =>  "string",
        "refund_price"      =>  "float",
        "type"              =>  "boolean",
        "payment_params"    =>  "text",
        "refund_params"     =>  "text",
        "total_price"       =>  "float",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];

    //Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Validation rules
    public static function validationRules()
    {
        return [
            'quantity'          =>  ['required'],
            'package_id'        =>  ['required'],
            'delivery_price'    =>  ['required'],
            'total_price'       =>  ['required']
        ];
    }

    //Store
    public static function store($request , $order=null)
    {
        //Update case
        if($order == null)
            $order = new Order();
        
        if(auth()->user()->type !== 'Admin')
            $order->user()->associate(auth()->user());
        
        $order->fill($request->all())->save();
    }

    //Update order
    public function updateOrder($request)
    {
        self::store($request, $this);
    }
}
