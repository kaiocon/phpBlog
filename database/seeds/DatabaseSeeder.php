<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		factory(App\blogPost::class, 5)->create();
		DB::table('users')->insert([
			'name' => 'Kai O'Connor',
			'email' => 'b00316022@Studentmail.uws.ac.uk',
			'password' => bcrypt('password'),
        ]);
    }
}
