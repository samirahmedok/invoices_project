<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\invoices;

class invoices_reports extends Controller
{
    public function index()
    {
        return view('reports/invoices_reports');
    }

    public function search_invoices(Request $request)
    {
        $radio = $request->radio;
        if ($radio == 'النوع') {
            if ($request->type && $request->start_at == '' && $request->end_at == '') {

                $invoices = invoices::select('*')->where('Status','=',$request->type)->get();
                $type = $request->type;
                return view('reports/invoices_reports',compact('type'))->withDetails($invoices);
            }else{
                $start_at = $request->start_at;
                $end_at = $request->end_at;
                $type = $request->type;

                $invoices = invoices::whereBetween('invoice_Date' ,[$start_at , $end_at])->where('Status','=',$request->type)->get();
                return view('reports/invoices_reports',compact('type','start_at','end_at'))->withDetails($invoices);
            }
        }
        else
        {
            $invoices = invoices::select('*')->where('invoice_number' , '=' , $request->invoice_number)->get();
            return view('reports/invoices_reports')->withDetails($invoices);
        }
    }
}
