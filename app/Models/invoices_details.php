<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices_details extends Model
{
    protected $fillable = [
        "invoice_id",
        "invoice_number",
        "product",
        "Section",
        "Status",
        "Value_Status",
        "Payment_Date",
        "note",
        "user",
    ];
    protected function section(){
        return $this->belongsTo('App\Models\sections');
    }
}
