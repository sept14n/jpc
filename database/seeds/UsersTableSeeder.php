<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'division' => Str::random(10),
            'email' => Str::random(10) . '@jpc.com',
            'username' => Str::random(10),
            'password' => Hash::make('123456'),
        ]);
    }
}
