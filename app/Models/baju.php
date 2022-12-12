<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class baju extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'baju';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(kategori::class,'fk_kategori','id');
    }

    public function Baju(){
        return $this->hasMany(Dfoto::class,'id_baju','id');
    }

    public function Review(){
        return $this->hasMany(review::class,'fk_baju','id');
    }
    public function Size(){
        return $this->belongsToMany(size::class,'d_baju','fk_baju','fk_size')->withPivot('id','fk_baju','stok','fk_size','status','deleted_at');
    }
}
