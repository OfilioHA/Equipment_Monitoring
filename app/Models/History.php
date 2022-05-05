<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = ['output', 'successful'];

    public function computer(){
        return $this->belongsTo(Computer::class);
    }

    public function command(){
        return $this->belongsTo(Command::class);
    }
}
