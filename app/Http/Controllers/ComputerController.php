<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Computer;
use App\Models\ComputerCommand;
use App\Models\History;

class ComputerController extends Controller
{
    public function list()
    {

        $computers = Computer::all();
        $list = [];

        foreach ($computers as $computer) {
            $attributes = $computer->getAttributes();
            $process = new Process(['ping', '-c', 1, $computer['ip']]);
            $process->run();
            $attributes['active'] = $process->isSuccessful();
            $attributes['commands'] = $computer->commands;
            $process->stop();
            $list[] = $attributes;
        }

        return $list;
    }

    public function history()
    {
        $list = [];

        foreach (History::all() as $history) {
            $attributes = $history->getAttributes();
            $attributes['ip'] = $history->computer()->get()->first()->ip;
            $list[] = $attributes;
        }

        return response()->json($list);
    }

    public function monitoring($id)
    {
        $computer = Computer::find($id);

        $commands = $computer->commands();
        $commandResponse = [];

        foreach ($commands->get() as  $computerCommand) {
            $pivot = ComputerCommand::find($computerCommand->id);
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
            $processState = $process->isSuccessful();

            $commandResponse[] = [
                "name" => $command->name,
                "state" => $processState,
                "output" => ($processState) ? $process->getOutput() : "Ha ocurrido un error"
            ];

            $process->stop();
        }

        $response = [
            "ip" => $computer->ip,
            "commands" => $commandResponse
        ];

        return response()->json($response);
    }
}
