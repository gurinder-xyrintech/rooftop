<?php

namespace App;

use App\Order;
use App\UserActivation;
use App\Mail\UserPassword;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 
        'lastname', 
        'email',  
        'type', 
        'status',
        'brick_standard',
        'brick_expanded',
        'brick_claims',
        'assignement',
        'salt',
        'registered'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "brick_standard"    =>  "integer",
        "brick_expanded"    =>  "integer",
        "brick_claims"      =>  "integer",
        "salt"              =>  "string",
        "assignement"       =>  "integer",
        "firstname"         =>  "string",
        "lastname"          =>  "string",
        "email"             =>  "string",
        "type"              =>  "string",
        "registered"        =>  "integer",
        "created_at"        =>  "datetime",
        "updated_at"        =>  "datetime",
        "deleted_at"        =>  "datetime",
    ];

    //Relationship
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    //Validation rules
    public static function validationRules()
    {
        $rules = [
            'firstname'     => ['required', 'min:3', 'max:255'],
            'email'         => ['required', 'email', 'unique:users,email'],
            'registered'    => ['required', 'numeric'],
            'password'      => ['required', 'min:6', 'confirmed']
            
        ];

        return $rules;
    }

    //Validation rules for login
    public static function loginValidationRules()
    {
       $rules =  [
           "email"     => ["required", "email", "exists:users,email"],
           "password"  => ["required"],
       ];
       return $rules;
    }

    //Store User
    public static function store($request, $user = null, $update = false)
    {
        if ($user === null) {
            $user = new User();
            $user->status = "ActivationPending";
        }
        
       $user->fill($request->all());


       //Update case
       if (isset($request["password"]) && !is_null($request["password"])) {
           $user->password = bcrypt($request["password"]);
       }

       //Save User
       $user->save();

       //Store activation token for user
       if ($update === false) {
           UserActivation::store($user);
       }

       return $user;
    }

    public function updateUser($request)
    {   
        self::store($request, $this, true);
    }
}
