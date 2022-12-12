<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'kategori';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

     //kategori dimiliki oleh banyak baju
    public function kategoriBaju(){
        return $this-> hasMany(baju::class,'fk_kategori','id');
    }
}
