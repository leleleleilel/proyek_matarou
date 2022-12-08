<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    use HasFactory;
    protected $table = 'size';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    //size dimiliki oleh banyak d_baju
    public function sizeBaju(){
        return $this-> hasMany(d_baju::class,'fk_size','id');
    }
}
