<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    protected $table = "review";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    
}
