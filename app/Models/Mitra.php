<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitras';

    protected $fillable = [
        'user_id',
        'nama_anda',
        'nama_bisnis',
        'email_bisnis',
        'tipe_venue',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
