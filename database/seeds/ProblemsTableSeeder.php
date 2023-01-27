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
        for ($i = 0; $i < 10; $i++) {

            // ダミーデータを複数登録する
            $params[] =
                [
                    'problem_0' => ($i + 1) . '-1の問題',
                    'problem_1' => ($i + 1) . '-2の問題',
                    'problem_2' => ($i + 1) . '-3の問題',
                    'problem_3' => ($i + 1) . '-4の問題',
                    'problem_4' => ($i + 1) . '-5の問題',
                    'problem_5' => ($i + 1) . '-6の問題',
                    'problem_6' => ($i + 1) . '-7の問題',
                    'problem_7' => ($i + 1) . '-8の問題',
                    'problem_8' => ($i + 1) . '-9の問題',
                    'problem_9' => ($i + 1) . '-10の問題'
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
