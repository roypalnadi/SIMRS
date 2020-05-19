<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

        DB::table('users')->insert([
        	'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 1,
        ]);

        DB::table('polikliniks')->insert([
            'name' => 'Anak',
        ]);

        DB::table('polikliniks')->insert([
        	'name' => 'Gizi',
        ]);

        DB::table('polikliniks')->insert([
        	'name' => 'Umum',
        ]);

        DB::table('polikliniks')->insert([
        	'name' => 'Bedah',
        ]);

        DB::table('polikliniks')->insert([
        	'name' => 'Gigi Umum',
        ]);

        for ($i=0; $i < 20; $i++) { 

	        $randomStatus = rand(1, 2);
	        if ($randomStatus == 1) {
	        	$status = 'Baru';
	        }else{
	        	$status = 'lama';
	        }

        	DB::table('pasiens')->insert([
        		'name' => $faker->name,
        		'email' => $faker->email,
        		'no_hp' => $faker->phoneNumber,
        		'alamat' => $faker->address,
        		'poliklinik_id' => rand(1, 5),
        		'kategori_pasien' => $status,
                'date_create' => date('Y-m-d'),
        	]);
        }
        
    }
}
