<?php

namespace Database\Seeders;

use App\Models\Computer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mask = '255.255.255.0';
        $subnet = '0';

        $computers = [
            [
                'ip' => '3',
            ],
            [
                'ip' => '8',
                'username' => 'ofilio',
                'password' => '123qwe'
            ]
        ];

        foreach($computers as $computer){
            $computer['ip'] = "192.168.{$subnet}.{$computer['ip']}";
            $computer['mask'] = $mask;
            (new Computer($computer))->save();
        }

    }
}
