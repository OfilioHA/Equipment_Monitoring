<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function list(){

        $computers = Computer::all();
        $list = [];

        foreach($computers as $computer){
            $attributes = $computer->getAttributes();
            $process = new Process(['ping','-c',1, $computer['ip']]);
            $process->run();
            $attributes['active'] = $process->isSuccessful();
            $process->stop();
            $list[] = $attributes;
        }

        return $list;
    }
}
