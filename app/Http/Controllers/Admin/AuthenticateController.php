<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\UserToken;
use App\UserActivation;
use App\Mail\UserPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthenticateController extends Controller
{   
    //Admin can register new admin
    public function register(Request $request)
    {
        $password = Str::random(30);

        $request['password'] = $password;
        $request['password_confirmation'] = $password;
        
        //Validate Data
        $this->validateData($request->all(), User::validationRules());      
        
        $request['type'] = 'Admin';

        $user = User::store($request);

        // Mail to user his password
        if(!empty($user)){
            $password = $request->password;
            Mail::to($user->email)->send(new UserPassword($user, $password));
        }
    }

    //Only Admin can Login
    public function login(Request $request)
    {
        $request['type'] = "Admin";
        // Validate data
        $this->validateData($request->all(), User::loginValidationRules());         

        try {
            // Attempt to verify the credentials and create a token for the user
            if (!Auth::attempt($request->only(["email", "password", "type"]))) {
                return response()->json(["error" => "InvalidCredentials"], 401);
            }
        } catch (\Exception $e) {
            // Something went wrong whilst attempting to encode the token
            return response()->json(["error" => "could_not_create_token"], 500);
        }
        //Store token in user tokens table And Get Authenticated User
        {   
            $user = Auth::user();
    
            $token =  $user->createToken('MyApp')->accessToken; 
        
            UserToken::store($request, $token);

            //Get user
            if (isset($user) && $user->status === "ActivationPending") {
                // Resend Activation Email
                UserActivation::store($user);
                return response()->json(
                    [
                        "error" => "Account Not Active"
                    ],
                    401
                );
            } else {
                return response()->json(compact(
                    "token",
                    "user"
                ));
            }
            
            
        }
    }

}
