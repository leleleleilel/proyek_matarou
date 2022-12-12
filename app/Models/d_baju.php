<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class d_baju extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'd_baju';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function size()
    {
        return $this->belongsTo(size::class,'fk_size','id');
    }
    public function user()
    {
        return $this->belongsToMany(User::class,'cart','id_dbaju','id_user')->withPivot('id','id_dbaju','id_user','quantity','deleted_at');
    }
}
