<?php

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Categories::create(['name' => 'News', 'active' => 1, 'slug' => 'news']);
    }
}
