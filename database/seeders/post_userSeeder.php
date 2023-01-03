<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\post_user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class post_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("post_users")->insert([
            ["post_id"=>1,"user_id"=>2011170073]
            ]);
    }
}
