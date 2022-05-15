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
                'parameters' => 0,
                'name' => 'Directorio Actual',
                'nickname' => 'Directorio'
            ],
            [
                'line' => 'ip a',
                'parameters' => 0,
                'name' => "Direccion IP",
                'nickname' => "IP"
            ],
            [
                'line' => 'who',
                'parameters' => 0,
                'name' => "Sesiones activas",
                'nickname' => "Sesiones"
            ]
        ];
        foreach ($commands as $command) {
            (new Command($command))
                ->save();
        }
    }
}
