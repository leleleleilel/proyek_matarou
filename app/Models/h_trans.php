<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class h_trans extends Model
{
    use HasFactory;

    protected $table = "h_trans";
    protected $primaryKey = "nomornota";
    public $incrementing = false;
    public $timestamps = false;

    public function kodePromo(){
        return $this->hasMany(h_trans::class,'fk_kode_promo','id');
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
