<?php

use Illuminate\Database\Seeder;
use App\MovementType;

class MovementTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovementType::create([
        	'name' => 'Entrada'
        ]);
        MovementType::create([
        	'name' => 'Salida'
        ]);
    }
}
