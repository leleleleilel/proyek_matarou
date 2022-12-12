<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class h_trans extends Model
{
    use HasFactory;

    protected $table = "h_trans";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;

    public function kodePromo(){
        return $this->belongsTo(kode_promo::class,'fk_kode_promo','id');
    }

    public function user()
    {
        return $this->belongsTo(user::class,'fk_user','id');
    }
    public function review()
    {
        return $this->hasOne(review::class,'fk_htrans','id');
    }
}
