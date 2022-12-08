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
}
