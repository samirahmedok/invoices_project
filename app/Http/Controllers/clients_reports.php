<?php

namespace App\Http\Controllers;

use App\Models\sections;
use App\Models\invoices;
use Illuminate\Http\Request;

class clients_reports extends Controller
{
    public function index()
    {
        $sections = sections::all();
        return view('reports.clients_reports', compact('sections'));
    }

    public function search_clients(request $request)
    {
        if ($request->Section&&$request->product&&$request->start_at =='' &&$request->end_at =='') {
            $sections = sections::all();
            $invoices = invoices::select('*')->where('section_id','=',$request->product)->where('product','=',$request->product)->get();
            return view('reports.clients_reports',compact('sections'))->withDetails($invoices);
        }
        else
        {
            $sections = sections::all();
            $start_at = date($request->start_at);
            $end_at = date($request->end_at);
            $invoices = invoices::whereBetween('invoice_Date',[$start_at,$end_at])->where('section_id','=',$request->Section)->where('product','=',$request->product)->get();
            return view('reports.clients_reports',compact('sections'))->withDetails($invoices);
        }
    }
}
