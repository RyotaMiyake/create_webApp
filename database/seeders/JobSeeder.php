<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            'name' => '未設定'   
        ]);
        DB::table('jobs')->insert([
            'name' => '学生',
        ]);
        DB::table('jobs')->insert([
            'name' => '社会人',
        ]);
    }
}
