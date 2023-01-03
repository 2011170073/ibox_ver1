<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->bigIncrements("id");#自動で番号が割り振られていくidカラム
            
            $table->unsignedBigInteger('follow_id');#手動idを設定する型でfollow_idカラム作成を宣言
            $table->foreign("follow_id")->references("id")->on("users")->onDelete("cascade");
            #follow_idに対して、usersテーブルのidと関連付けられた外部キーとする設定を施す
            $table->unsignedBigInteger('follower_id');
            $table->foreign("follower_id")->references("id")->on("users")->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
};
