<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    public function commands(){
        return $this->belongsToMany(Command::class);
    }

    public function logs(){
        return $this->hasMany(Log::class);
    }
}
