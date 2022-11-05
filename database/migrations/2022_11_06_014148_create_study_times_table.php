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
        Schema::create('study_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();    //usersテーブルのidを外部キーに設定(多:1)
            $table->foreignId('certification_id')->nullable()->constrained();   //certificationsテーブルのidを外部キーに設定(多:1)
            $table->dateTime('started_at'); //勉強開始時間
            $table->dateTime('ended_at');   //勉強終了時間
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_times');
    }
};
