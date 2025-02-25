<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles = array('admin', 'dealer', 'user' );
       foreach ($roles as $value) {
       		DB::table('roles')->insert([
       			'role'=> $value		
       		]);
       }
    }
}
