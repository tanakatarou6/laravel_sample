<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ダミーデータを1つ登録する場合
        // DB::table('users')->insert([
        //     'name' => '1111',
        //     'email' => '11@11.11',
        //     'password' => bcrypt('1111'),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

        // ダミーデータを複数登録する場合
        $params =
            [
                [
                    'name' => '1111',
                    'email' => '11@11.11',
                    'password' => bcrypt('1111'),
                ],
                [
                    'name' => '2222',
                    'email' => '22@22.22',
                    'password' => bcrypt('2222'),
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
