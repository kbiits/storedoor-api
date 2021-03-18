<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FavoriteProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FavoriteProduct::factory(10)->create();
    }
}
