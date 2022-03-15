<?php

namespace Database\Seeders;

use App\Models\Libro;
use Database\Factories\LibroFactory;
use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Libro::factory()->count(5)->create();
    }
}
