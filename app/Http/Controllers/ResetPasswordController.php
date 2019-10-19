<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetSuccessfully;
use App\PasswordReset;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        //Validation
        $this->validateData($request->all(), PasswordReset::validationRules());       
    
       //Get token
       {
           $email = PasswordReset::whereToken($request->token)->first();
           if(empty($email))
                return response()->json([
                    'error' => 'Token does not exist.'
                ]);
               
           if($email->email != $request->email)
                return response()->json([
                    'error' => 'Email does not match with requested email.'
                ]);
              
       }
       //Update password
       {
           $user = User::where('email', $request->email)->first();
           $user->update(['password' => bcrypt($request->password)]);
       }
       //Raise notification
       Mail::to($request->email)->send(new PasswordResetSuccessfully($user));
       
       //Delete token after use
       PasswordReset::whereEmail($request->email)->delete();
    }
}
