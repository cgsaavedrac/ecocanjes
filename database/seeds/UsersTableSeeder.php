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
        User::create([
        	'name' => 'Claudio Saavedra',
            'email' => 'claudiosaavedra@pesic.cl',
            'password' => bcrypt('p3s1c$811'),
            'admin' => true
        ]);
    }
}
