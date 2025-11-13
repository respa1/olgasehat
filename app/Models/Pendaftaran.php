<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function galleries()
    {
        return $this->hasMany(VenueGallery::class)->orderBy('urutan');
    }
}
