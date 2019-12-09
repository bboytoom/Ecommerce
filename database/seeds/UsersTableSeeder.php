<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
			[
				'name' => 'niki', 
				'father_surname' => 'gatofather', 
				'mother_surname' => 'gatomother', 
				'email' => 'niki@correo.com', 
				'password' => \Hash::make('prueba123'),
				'status' => 1,
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],

		);

		User::insert($data);
    }
}
