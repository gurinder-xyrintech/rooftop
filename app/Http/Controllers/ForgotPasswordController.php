<?php

namespace App\Http\Controllers;

use App\User;
use App\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordEmail;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function store(Request $request)
    {
        // Validate Data
        $this->validateData($request->all(), PasswordReset::validationRulesForForgotPassword()); 
        
        //Create token
        {
            //Create password-reset object
            $password_reset = new PasswordReset();
            
            //Get email
            $password_reset->email = $request->email;
            $user = User::whereEmail($request->email)->first();
            //Generate token
            $password_reset->token = Str::random(40);
            $password_reset->save();
            
        }
        //Send forgot password email
        Mail::to($request->email)->send(new ForgotPasswordEmail($password_reset->token, $user));
    }
}
