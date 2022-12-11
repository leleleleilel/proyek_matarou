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
        return $this->belongsTo(size::class);
    }
}
