<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catogery extends Model
{
    protected $table='catogery';
    use  HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'parent',
    ];
}
