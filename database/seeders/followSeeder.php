<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\follow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class followSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("follows")->insert([
            ["follow_id"=>2011170073,"follower_id"=>2011170071]
            ]);
    }
}
