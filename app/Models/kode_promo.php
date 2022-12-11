<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kode_promo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'kode_promo';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    //1 kode promo bisa dipake banyak htrans
    public function h_trans(){
        return $this->hasMany(h_trans::class,'fk_kode_promo','id');
    }
}
