<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'inaba',
                'email' => 'inaba@gmail.com',
                'password'=>'testtest',
            ],
            [
                'id' => '2',
                'name' => 'tanaka',
                'email' => 'tanaka@gmail.com',
                'password'=>'testtest',
            ],
            [
                'id' => '3',
                'name' => 'watanabe',
                'email' => 'watanabe@gmail.com',
                'password'=>'testtest',
            ],
            ]);
    }
}
