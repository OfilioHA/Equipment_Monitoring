<?php

namespace Database\Seeders;

use App\Models\Command;
use App\Models\Computer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputerCommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Computer::all() as $computer){
            foreach([1,2] as $command){
                $c = Command::find($command);
                $computer->commands()->save($c);
            }
        }
    }
}
