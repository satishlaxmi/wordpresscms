<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catogery extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description','description','tag'
    ];
}
