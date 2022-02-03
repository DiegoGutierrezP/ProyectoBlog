<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'=> 'Diego Gutierrez Pineda',
            'email' => 'diego.gup.75@gmail.com',
            'password' => bcrypt('diego123')
        ])->assignRole('Admin');//asignanado un role con el paquete laravel permision

        User::factory(30)->create();
    }
}
