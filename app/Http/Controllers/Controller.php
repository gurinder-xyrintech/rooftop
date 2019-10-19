<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Validate Data
    public function validateData($request, $rules, $messages = null)
    {  
        if($messages === null)
           $messages = [];
        
       //Customer validation
        $validator = Validator::make($request, $rules, $messages);
        
        if($validator->fails())
            throw ValidationException::withMessages($validator->errors()->getMessages());
            
    }
}
