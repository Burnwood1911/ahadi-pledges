<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'amount',
        'payment_date',
        'pledge_id',
        'payment_method_id'
    ];


    public function pledge()
    {
        return $this->belongsTo(Pledge::class, 'pledge_id', 'id');
    }

    public function payment_method()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'payment_method_id');
    }
}
