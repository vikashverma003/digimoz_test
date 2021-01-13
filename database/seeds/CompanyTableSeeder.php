<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->insert(array(
        	array(
				'company_name' => "Nokia",
        	),
        	array(
				'company_name' => "Samsung",
        	),
        	array(
				'company_name' => "Pocco",
        	),
        	array(
				'company_name' => "Lava",
        	),
        	array(
				'company_name' => "v3",
        	)
        ));
    }
}
