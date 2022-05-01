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
        $ips = ['3'];
        $mask = '255.255.255.0';

        foreach($ips as $ip){
            $ipReal = "192.168.0.{$ip}";
            $computer = new Computer([
                "ip" => $ipReal,
                "mask" => $mask
            ]);
            $computer->save();
        }
    }
}
