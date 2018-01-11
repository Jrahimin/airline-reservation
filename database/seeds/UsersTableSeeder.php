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
        $admin = new \App\Model\User([
        	'name'     => 'Algrims',
        	'email'    => 'algrims@gmail.com',
        	'password' => bcrypt('123456'),
            'role' => 1,
            'company_id' => 1,
        	]);
        $admin->save();
    }
}
