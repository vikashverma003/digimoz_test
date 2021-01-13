<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('admins')->insert(array(
        	array(
				'name' => "Steve",
				'email' => 'steve@gmail.com',
				'password' => bcrypt('secret'),
        	),
        	array(
				'name' => "saura",
				'email' => 'saura@gmail.com',
				'password' => bcrypt('secret'),
        	)
        ));

    }
}