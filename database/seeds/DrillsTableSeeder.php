<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {

            // ダミーデータを複数登録する
            $params[] =
                [
                    'title' => ($i + 1) . '個目の練習',
                    'category_name' => 'テスト' . ($i + 1),
                    'user_id' => ($i % 2) + 1,
                ];
        }
        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            // print_r($param);
            DB::table('drills')->insert($param);
        }
    }
}
