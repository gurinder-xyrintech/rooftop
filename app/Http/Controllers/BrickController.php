<?php

namespace App\Http\Controllers;

use App\Brick;
use App\ReportType;
use Illuminate\Http\Request;

class BrickController extends Controller
{
    //List
    public function index()
    {
        return Brick::with('reportType')->get();
    }

    //Show
    public function show($id)
    {
        return Brick::with('reportType')->whereId($id)->first();
    }

    //update
    public function update(Request $request, $id)
    {
        $brick = Brick::findOrFail($id);

        $array = $request->toArray();
    
        foreach ($array as $key => $value){
            $brick->update([$key => $value]);
        }
       
    }

    //Delete 
    public function delete($id)
    {
        Brick::findOrFail($id)->delete();
    }
}
