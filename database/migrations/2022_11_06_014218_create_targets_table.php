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
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();    //usersテーブルのidを外部キーに設定(多:1)
            $table->foreignId('certification_id')->nullable()->constrained();   //certificationsテーブルのidを外部キーに設定(多:1)
            $table->date('completion_date')->constrained(); //目標とする資格の日時
            $table->integer('completion_studytime')->constrained(); //目標勉強時間
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('targets');
    }
};
