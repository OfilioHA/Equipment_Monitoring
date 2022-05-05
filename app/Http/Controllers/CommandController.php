<?php

namespace App\Http\Controllers;

use App\Models\ComputerCommand;
use App\Models\History;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class CommandController extends Controller
{
    public function execute($id)
    {

        $pivot = ComputerCommand::find($id);
        $computer = $pivot->computer()->get()->first();
        $command  = $pivot->command()->get()->first();

        $process = new Process(
            [
                'sshpass',
                '-p',
                $computer->password,
                'ssh',
                "{$computer->username}@{$computer->ip}",
                $command->line
            ],
        );
        
        $process->run();

        $history = new History([
            'output' => $process->getOutput(),
            'successful' => $process->isSuccessful()
        ]);

        $history->command()->associate($command);
        $history->computer()->associate($computer);
        $history->save();

        return response()->json($history);
    }
}
