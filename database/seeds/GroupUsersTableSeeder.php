<?php

use Illuminate\Database\Seeder;

class GroupUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_users')->insert([
            [
                'id' => '1',
                'user_id' => 1,
                'group_id' => 1,
            ],
            [
                'id' => '2',
                'user_id' => 2,
                'group_id' => 1,
            ],
            [
                'id' => '3',
                'user_id' => 1,
                'group_id' => 2,
            ],
            [
                'id' => '4',
                'user_id' => 2,
                'group_id' => 2,
            ],
            [
                'id' => '5',
                'user_id' => 3,
                'group_id' => 2,
            ],

            ]);
    }
}
