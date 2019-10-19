<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Mail\UserPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ManageUserController extends Controller
{
    //Show all users
    public function index()
    {
        return User::all();
    }

    //Show single user
    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(Request $request)
    {
        $password = Str::random(30);

        $request['password'] = $password;
        $request['password_confirmation'] = $password;
        
        //Validate Request for registering user
        $this->validateData($request->all(), User::validationRules());

        $user = User::store($request);
        
        // Mail to user his password
        if(!empty($user)){
            $password = $request->password;
            Mail::to($user->email)->send(new UserPassword($user, $password));
        }
    }

    //Update user
    public function update(Request $request, $id)
    {
        $record = User::findOrFail($id);
        
        $record->updateUser($request);
    }

    //Delete user
    public function delete($id)
    {
        User::findOrFail($id)->delete();
    }
}
