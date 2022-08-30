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

    public function videospecialty()
    {
        return $this->hasMany(Video::class);
    }
}
