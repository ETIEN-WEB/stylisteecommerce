<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpass_reset extends Model
{
    use HasFactory;
    protected $fillable = [
        'userid',
        'reset_code'
    ];
}
