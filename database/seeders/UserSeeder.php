<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder{
    public function run(){
        DB::table('users')->insert([
        [
            "id"=>2011170071,
            'email' => 'tebasuke1827@gmail.com',
            'name' => 'admin2',
            'password' => Hash::make('Chiho4332'),
        ],
      
        ]);
    }
}




