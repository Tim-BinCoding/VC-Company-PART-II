<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    public function university(){
        return $this->belongsTo(University::class);
    }
    protected $casts = [
        'created_at' => 'datetime:Y/m/d',
    ];
}