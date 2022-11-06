<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Thread;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->insert([
            'title' => '勉強方法について',
            'user_id' => 1,
        ]);
        DB::table('threads')->insert([
            'title' => '試験内容について',
            'user_id' => 1,
        ]);
    }
}
