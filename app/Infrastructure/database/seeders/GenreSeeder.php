<?php

namespace Database\Seeders;
use App\Domain\Entities\Genre;

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::factory()->count(5)->create();
        
    }
}
