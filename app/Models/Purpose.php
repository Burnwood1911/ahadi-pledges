<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    use HasFactory;


    protected $fillable = [
        'title'
    ];



    public function pledge()
    {
        return $this->belongsTo(Pledge::class);
    }
}
