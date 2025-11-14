<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapanganSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'lapangan_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'harga',
        'harga_awal',
        'status',
        'is_promo',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'is_promo' => 'boolean',
    ];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }
}

