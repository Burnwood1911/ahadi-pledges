<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    use HasFactory;


    protected $fillable = [
        'description',
        'amount',
        'pledge_type_id',
        'deadline',
        'purpose_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function pledgeType()
    {
        return $this->hasOne(PledgeType::class);
    }

    public function purpose()
    
    {
        return $this->hasOne(Purpose::class);
    }
}
