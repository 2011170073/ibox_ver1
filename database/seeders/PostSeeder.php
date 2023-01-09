<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("posts")->insert([
               ["title"=>"こんばんわ","body"=>"いえいえいえい","image"=>"a","user_id"=>2011170071,"created_at"=>now()],
            ]);
    }
}
