<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    public static function validationRules()
    {
        return [
            "email"                 => ["required", "email", "exists:users,email"],
            "token"                 => ["required"],
            "password"              => ["required", "confirmed", "min:6"],
            "password_confirmation" => ["required", "min:6"]
        ];
    }

    public static function validationRulesForForgotPassword()
    {
        return [
            "email" => "required|email|exists:users,email"
        ];
    }
}
