<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Certification;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('certifications')->insert([
            'name' => '未設定',
            'detail' => '特になし',
        ]);
        DB::table('certifications')->insert([
            'name' => 'ITパスポート',
            'detail' => '合格率：○○％',
        ]);
        DB::table('certifications')->insert([
            'name' => '基本情報技術者試験', 
            'detail' => '合格率：××％',
        ]);
    }
}
