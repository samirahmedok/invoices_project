<?php

namespace App\Http\Controllers;


use App\Models\invoices;
use Illuminate\Http\Request;

class InvoiceArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoices::onlyTrashed()->get();
        return view('invoices.archive_invoices',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoice_archive  $invoice_archive
     * @return \Illuminate\Http\Response
     */
    public function show(invoice_archive $invoice_archive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoice_archive  $invoice_archive
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice_archive $invoice_archive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoice_archive  $invoice_archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->invoice_id;
         $flight = Invoices::withTrashed()->where('id', $id)->restore();
         session()->flash('restore_invoice');
         return redirect('/invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice_archive  $invoice_archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $invoices = invoices::withTrashed()->where('id',$request->invoice_id)->first();
         $invoices->forceDelete();
         session()->flash('delete_invoice');
         return redirect('/archive');
    
    }
}
