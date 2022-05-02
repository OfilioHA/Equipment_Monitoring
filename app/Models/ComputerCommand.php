<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerCommand extends Model
{
    public $table = 'command_computer';

    use HasFactory;

    public function computer(){
        return $this->belongsTo(Computer::class);
    }

    public function command(){
        return $this->belongsTo(Command::class);
    }
}
