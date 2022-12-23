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
        return $this->hasMany(Payment::class, 'id', 'payment_id');
    }

    public function pledgeType()
    {
        return $this->hasOne(PledgeType::class);
    }


    public function purpose()
    {
        return $this->hasOne(Purpose::class, 'id', 'purpose_id');
    }


    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->join('users', 'pledges.user_id', '=', 'users.id')
            ->select('users.id AS user_id', 'pledges.id AS id', 'users.first_name', 'users.second_name', 'users.last_name', 'pledges.purpose_id', 'pledges.deadline', 'pledges.amount')->where('first_name', 'like', '%' . request('tag') . '%')
                ->orWhere('second_name', 'like', '%' . request('tag') . '%')
                ->orWhere('last_name', 'like', '%' . request('tag') . '%');
            
        }

    }

   
}
