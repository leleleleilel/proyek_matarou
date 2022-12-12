<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "user";
    public $timestamps = false;
    protected $fillable = [
        'username',
        'password',
        'nama',
        'alamat',
        'no_telp',
        'email',
        'role',
        'deleted_at'
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

    public function htrans()
    {
        return $this->hasMany(h_trans::class,'fk_user','id');
    }
    // public function cart()
    // {
    //     return $this->hasMany(cart::class,'id_user','id');
    // }
    public function d_baju()
    {
        return $this->belongsToMany(d_baju::class,'cart','id_user','id_dbaju')->withPivot('id','id_dbaju','id_user','quantity','deleted_at');
    }
}
