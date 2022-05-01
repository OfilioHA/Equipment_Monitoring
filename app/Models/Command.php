<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function computers(){
        return $this->belongsToMany(Computer::class);
    }
}
