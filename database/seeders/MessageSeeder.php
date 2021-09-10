<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('messages')->insert([
                'user_id' => rand(0, 1),
                'chat_id' => 0,
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus semper blandit orci, vel euismod ligula. Phasellus justo purus, hendrerit sed eros vitae, placerat ornare sapien.',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('messages')->insert([
                'user_id' => rand(2, 3),
                'chat_id' => 1,
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus semper blandit orci, vel euismod ligula. Phasellus justo purus, hendrerit sed eros vitae, placerat ornare sapien.',
            ]);
        }
    }
}
