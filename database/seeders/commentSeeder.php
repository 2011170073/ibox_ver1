<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class commentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table("comments")->insert([
            ["body"=>"こんにちは","user_id"=>2011170074,"post_id"=>30]
            ]);
    }
}
