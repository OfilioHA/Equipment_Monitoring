<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Computer;
use App\Models\History;

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
            $attributes['commands'] = $computer->commands;
            $process->stop();
            $list[] = $attributes;
        }

        return $list;
    }

    public function history(){
        $list = [];

        foreach(History::all() as $history){
            $attributes = $history->getAttributes();
            $attributes['ip'] = $history->computer()->get()->first()->ip;
            $list[] = $attributes;
        }

        return response()->json($list);
    }
}
