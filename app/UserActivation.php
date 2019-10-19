<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Mail\AccountActivationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserActivation extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Store users's activation link
    public static function store($user, $user_verification = null)
    {
       if($user_verification === null){
           $record = new UserActivation();
       }
       $record->user()->associate($user);
       $record->sent_on = Carbon::now();
       $record->token = Str::random(40);
       $record->valid_till = Carbon::now()->addDays(2);
       $record->save();
       
        //Send Account Activation email
       Mail::to($user->email)->send(new AccountActivationMail($record->token, $user));
    }
}
