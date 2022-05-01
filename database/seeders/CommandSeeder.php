<?php

namespace Database\Seeders;

use App\Models\Command;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commands = [
            [
                'line' => 'pwd',
                'parameters' => 0
            ]
        ];
        foreach($commands as $command){
            (new Command($command))
                ->save();
        }
    }
}
