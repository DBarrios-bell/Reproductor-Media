<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttentionPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'regional'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
