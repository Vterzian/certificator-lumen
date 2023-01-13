<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([
            'firstname' => 'valentin', 
            'lastname' => 'terzian',
            'username' => 'vterzian',
            'email' => 'valterzian@gmail.com',
            'password' => Hash::make('vterzian')
        ]);
    }
}