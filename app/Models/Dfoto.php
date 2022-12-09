<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dfoto extends Model
{
    use HasFactory;

    protected $table = 'd_foto_baju';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}