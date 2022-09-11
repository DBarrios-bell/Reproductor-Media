<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'media',
        'descripcion'
    ];

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }
}
