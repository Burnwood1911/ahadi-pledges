<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'last_name',
        'profile_picture',
        'date_of_birth',
        'gender',
        'phone',
        'disabled',
        'email',
        'role_id',
        'jumuiya_id',
        'enabled',
        'password',
        'card_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jumuiya()
    {
        return $this->hasOne(Jumuiya::class, 'id', 'jumuiya_id');
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function card()
    {
        return $this->hasOne(Card::class, 'id', 'card_id');
    }

    public function pledges()
    {
        return $this->hasMany(Pledge::class);
    }

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('first_name', 'like', '%' . request('tag') . '%')
                ->orWhere('second_name', 'like', '%' . request('tag') . '%')
                ->orWhere('last_name', 'like', '%' . request('tag') . '%');
            
        }

    }
}
