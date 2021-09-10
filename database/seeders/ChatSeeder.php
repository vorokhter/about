<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->insert([
            'title' => Str::random(10),
            'users_id' => json_encode([0, 1]),
        ]);

        DB::table('chats')->insert([
            'title' => Str::random(10),
            'users_id' => json_encode([2, 3]),
        ]);
    }
}
