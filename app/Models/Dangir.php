<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dangir extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis',
        'rencana',
        'realisasi',
        'persentase',
        'status',
    ];
}
