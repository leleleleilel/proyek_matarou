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

}
