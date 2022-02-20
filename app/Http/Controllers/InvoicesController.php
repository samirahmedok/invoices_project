<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\Models\User; 
use App\Models\invoices;
use App\Models\sections;
use App\Models\invoices_attachments;
use App\Models\invoices_details;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notifications\added_invoice;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoices::all();
        return view('invoices/invoices' , compact("invoices"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = sections::all();
        return view("invoices.add_invoices" , compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        invoices::create([
            "invoice_number" => $request->invoice_number,
            "invoice_Date" => $request->invoice_Date,
            "Due_date" => $request->Due_date,
            "product" => $request->product,
            "section_id" => $request->section,
            "Amount_collection" => $request->Amount_collection,
            "Amount_Commission" => $request->Amount_Commission,
            "Discount" => $request->Discount,
            "Value_VAT" => $request->Value_VAT,
            "Rate_VAT" => $request->Rate_VAT,
            "Total" => $request->Total,
            "Status" => "غير مدفوعه",
            "Value_Status" => 'unpaid',
            "note" => $request->note,
            "Payment_Date" => $request->Payment_Date
        ]);
        $invoice_id = invoices::latest()->first()->id;
        invoices_details::create([
            "invoice_id" => $invoice_id,
            "invoice_number" => $request->invoice_number,
            "product" => $request->product,
            "Section" => $request->section,
            "Status" => "غير مدفوعه",
            "Value_Status" => 'unpaid',
            "Payment_Date" => $request->Payment_Date,
            "note" => $request->note,
            "user" => (auth::user()->name),            
        ]);
        if ($request->hasFile('pic')) {
            $invoice_id = invoices::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $invoice_number = $request->invoice_number;

            $attachments = new invoices_attachments();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $invoice_number;
            $attachments->Created_by = auth::user()->name;
            $attachments->invoice_id = $invoice_id;
            $attachments->save();

            //move picture
            $imgname = $request->pic->getClientOriginalName();
            $request->pic->move(public_path("Attachments/".$invoice_number),$imgname);
        }

        $user = User::find(Auth::user()->id);
        $invoices = invoices::latest()->first();
        // $user->notify(new \App\Notifications\added_invoice($invoices));
        Notification::send($user, new \App\Notifications\added_invoice($invoices));

        session()->flash("add" , "added successfully");
        return redirect('/invoices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoices = invoices::where('id', $id)->first();
        return view('invoices.invoices_status', compact('invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoices = invoices::where('id' , $id)->first();
        $sections = sections::all();
        return view('invoices.edit_invoice' , compact('invoices' ,'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $invoices = invoices::findOrFail($request->invoice_id);
        $invoices->update([
            "invoice_number" => $request->invoice_number,
            "invoice_Date" => $request->invoice_Date,
            "Due_date" => $request->Due_date,
            "product" => $request->product,
            "section_id" => $request->Section,
            "Amount_collection" => $request->Amount_collection,
            "Amount_Commission" => $request->Amount_Commission,
            "Discount" => $request->Discount,
            "Value_VAT" => $request->Value_VAT,
            "Rate_VAT" => $request->Rate_VAT,
            "Total" => $request->Total,
            "note" => $request->note,
        ]);
        session()->flash("edit" , "edited successfully");
        return back();
    }

    public function status_update($id , Request $request)
    {
        $invoices = invoices::findOrFail($id);
        
        if ($request->Status === 'مدفوعة') {

            $invoices->update([
                'Value_Status' => 'paid',
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
            ]);

            invoices_Details::create([
                'invoice_id' => $request->invoice_id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $request->Section,
                'Status' => $request->Status,
                'Value_Status' => 'paid',
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user' => (Auth::user()->name),
            ]);
        }

        else {
            $invoices->update([
                'Value_Status' => 'partial',
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
            ]);
            invoices_Details::create([
                'invoice_id' => $request->invoice_id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $request->Section,
                'Status' => $request->Status,
                'Value_Status' => 'partial',
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user' => (Auth::user()->name),
            ]);
        }
        session()->flash("payment_edit");
        return redirect("/invoices");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->invoice_id;
        $invoices = invoices::where("id" , $id)->first();
        $attach = invoices_attachments::where("invoice_id" , $id)->first();

        $id_page =$request->id_page;
        if (!$id_page=='2') {
            if (!empty($attach->invoice_number)) {
                storage::disk("public_uploads")->deleteDirectory($attach->invoice_number);
            }
            $invoices->forceDelete();

            session()->flash("invoice_delete");
            return back();
        }
            else {
               
                $invoices->delete();
                session()->flash('archive_invoice');
                return redirect('/archive');
            }
    }

    public function getproducts($id){
        $products = DB::table('products')->where('section_id' , $id)->pluck('product_name' , 'id');
        return json_encode($products);
    }

    public function paid_invoices()
    {
        // dd('samir');
        $invoices = invoices::where('Value_Status', 'paid')->get();
        return view('invoices.paid_invoices',compact('invoices'));
    }
    public function partial_invoices(){
        $invoices = invoices::where("Value_Status" , 'partial')->get();
        return view("invoices.partial_invoices" , compact('invoices'));
    }
    public function unpaid_invoices(){
        $invoices = invoices::where("Value_Status" , 'unpaid')->get();
        return view("invoices.unpaid_invoices" , compact('invoices'));
    }

    public function invoice_print($id){
        $invoices = invoices::where('id' ,$id)->first();
        return view('invoices.invoice_print' , compact('invoices'));
    }
    public function MarkAsRead_all(request $request)
    {
        $userUnreadNotification = auth()->user()->UnreadNotifications;
        if ($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }
    }
}
