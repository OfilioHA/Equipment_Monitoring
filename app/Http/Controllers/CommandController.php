<?php

namespace App\Http\Controllers;

use App\Models\ComputerCommand;
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
        dump($process->getOutput());
        dump($process->getCommandLine());
    }
}
