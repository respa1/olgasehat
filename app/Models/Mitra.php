<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitras';

    protected $fillable = [
        'nama_anda',
        'nama_bisnis',
        'email_bisnis',
        'tipe_venue',
        'status',
    ];
}
