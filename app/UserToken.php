<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserToken extends Model
{
    use SoftDeletes;

    //Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function store($request, $token)
    {
        $user = User::whereEmail($request->email)->first();
        $record = new UserToken();
        $record->token = "Bearer ".$token;
        $record->ip_address = $request->ip();
        $record->last_active = Carbon::now();
        $record->token_expire_time = Carbon::now();
        $record->user()->associate($user);
        $record->save();
    }
}
