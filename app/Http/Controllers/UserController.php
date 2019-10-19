<?php

namespace App\Http\Controllers;

use App\User;
use App\UserToken;
use Carbon\Carbon;
use App\UserActivation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //User Register
    public function register(Request $request)
    {
        //Validate Data
        $this->validateData($request->all(), User::validationRules($request));      
        
        User::store($request);
    }

    //Login
    public function login(Request $request)
    {
        // Validate data
        $this->validateData($request->all(), User::loginValidationRules());         

        try {
            // Attempt to verify the credentials and create a token for the user
            if (!Auth::attempt($request->only(["email", "password"]))) {
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

    //Activate User
    public function activateUser($token)
    {
       //Error Message
       $error = "Token does not exist.";
       //Token check
       {
           try {
               $verifyUser = UserActivation::where("token", $token)->first();
               //Check if token valid else send email
               {
                   if ($verifyUser->valid_till < Carbon::now()) {
                       UserActivation::store($verifyUser->user);
                       $error = "The link has expired, we have sent you another email to activate yor account.";
                       throw new \Exception();
                   }
               }
               //Activate user
               {
                   if (isset($verifyUser)) {
                       //Get user
                       $user = $verifyUser->user;
                       if ($user->status === "ActivationPending") {
                           $user->status = "Active";
                           $user->update();

                           //Update activation token record
                           $verifyUser->activation_on = Carbon::now();
                           $verifyUser->update();

                           //Delete User Activations Which is not Used
                           UserActivation::whereUserId($user->id)->where("id", "<>", $verifyUser->id)->forceDelete();
                       } elseif ($user->status === "Active") {
                           $error = "This user account is already active.";
                           throw new \Exception();
                       }
                       //Delete token after use
                       $verifyUser->delete();
                       return null;
                   }
               }
           } catch (\Exception $e) {
                
               goto ERROR;
           }
       }
       ERROR: return response()->json([
                'error' => $error
            ]);
    }

    //Logout method
    public function logout()
    {
        Auth::logout();
    }
}
