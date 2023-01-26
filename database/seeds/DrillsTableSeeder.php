<?php

use Illuminate\Database\Seeder;

class DrillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ダミーデータを複数登録する
        $params =
            [
                [
                    'title' => '1つ目の練習',
                    'category_name' => 'テスト1',
                    'problem_id' => '1',
                    'user_id' => '1',
                ],
                [
                    'title' => '2つ目の練習',
                    'category_name' => 'テスト2',
                    'problem_id' => '2',
                    'user_id' => '2',
                ]
            ];
        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;

            DB::table('users')->insert($param);
        }
    }
}
