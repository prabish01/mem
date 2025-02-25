<?php

use Illuminate\Database\Seeder;
use DB as DBS;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
            array(
                'id'=>'1',
                'name'=>'MEM Admin',
                'email'=>'manokamanaearthmovers2021@gmail.com',
                'password'=>Hash::make('manokamanaearthmovers2021@gmail.com!@#$%'),
                'role_id'=>'1',
                'verified'=>'1',
                'is_approved'=>'1',
            );
        DBS::table('users')->insert($users);
    }
}
