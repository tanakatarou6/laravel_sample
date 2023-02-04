<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProblemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {

            // ダミーデータを複数登録する
            $params[] =
                [
                    'drill_id' => $i,
                    'problem0' => $i . '-1の問題',
                    'problem1' => $i . '-2の問題',
                    'problem2' => $i . '-3の問題',
                    'problem3' => $i . '-4の問題',
                    'problem4' => $i . '-5の問題',
                    'problem5' => $i . '-6の問題',
                    'problem6' => $i . '-7の問題',
                    'problem7' => $i . '-8の問題',
                    'problem8' => $i . '-9の問題',
                    'problem9' => $i . '-10の問題'
                ];
        }
        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            // print_r($param);
            DB::table('problems')->insert($param);
        }
    }
}
