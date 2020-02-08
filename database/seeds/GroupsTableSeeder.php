<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'id' => '1',
                'name' => '初心者歓迎部屋！',
            ],
            [
                'id' => '2',
                'name' => '中級部屋！',
            ],

            ]);
    }
}
