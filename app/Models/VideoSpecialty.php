<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoSpecialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_id',
        'specialty_id'
    ];
    
    public function specialities(){
    return $this->belongsTo(Specialty::class);
    }
    public function videos(){
    return $this->belongsTo(Video::class);
    }

}
