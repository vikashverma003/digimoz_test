<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	        $this->call(AdminsTableSeeder::class);
                $this->call(CompanyTableSeeder::class);
               //$this->call(BudgetSeeder::class);

               $faker=Faker::create();
                //$authors = Faker::create('App\Author');
                for($i=1;$i<10;$i++){
                DB::table('authors')->insert(array(
                    array(
                        'name' =>$faker->sentence,
                        'bio' => $faker->sentence,
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now(),

                    )
                   ));

                 DB::table('posts')->insert(array(
                    array(
                        'title' => $faker->sentence,
                        'author_id' => $i,
                        'body' => $faker->paragraphs(rand(3,10), true),

                    )
                   ));

                DB::table('profiles')->insert(array(
                    array(
                          'birthday' => $faker->dateTimeBetween('-100 years', '-18 years'),
                            'author_id' => $i,
                            'city' => $faker->city,
                            'state' => $faker->state,
                            'website' => $faker->domainName,

                    )
                   ));

                }
            
// https://medium.com/risan/seeding-table-with-relationships-in-laravel-c1e18355013f

// https://github.com/fzaninotto/Faker
    }
}
