<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    // protected $dates = ['deleted at'];
    public function section()
    {
        return $this->belongsTo('App\Models\sections');
    }
}
