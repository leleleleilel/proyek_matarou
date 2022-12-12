<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class d_trans extends Model
{
    use HasFactory;
    protected $table = "d_trans";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function hTrans()
    {
        return $this->belongsTo(h_trans::class,'fk_htrans','id');
    }
    public function dBaju()
    {
        return $this->belongsTo(d_baju::class,'fk_dbaju','id');
    }
}
