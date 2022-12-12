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
}
