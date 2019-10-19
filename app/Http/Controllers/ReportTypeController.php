<?php

namespace App\Http\Controllers;

use App\Brick;
use App\ReportType;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Exception;

class ReportTypeController extends Controller
{   
    //List all report
    public function index()
    {
        return ReportType::with('bricks')->get();
    }

    //Save new report type
    public function store(Request $request)
    {
        $this->validateData($request->all(), ReportType::validationRules($request));
        
        return ReportType::store($request);     
    }

    //Show
    public function show($id)
    {
        return ReportType::findOrFail($id);
    }

    //Update report type
    public function update(Request $request, $id)
    {   
        $report = ReportType::findOrFail($id);

        $report->updateReportType($request);
    }

    //Delete report type
    public function delete($id)
    {
        ReportType::findOrFail($id)->delete();
    }
}
