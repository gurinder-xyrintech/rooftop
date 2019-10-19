<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManageCustomerController extends Controller
{
    //Show details
    public function show()
    {
        return Auth::user()->load('orders');
    }

    //Update
    public function update(Request $request)
    {
        $record =   Auth::user();

        $record->updateUser($request);
    }
    
}
