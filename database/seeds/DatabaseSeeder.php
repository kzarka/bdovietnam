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
        $this->call('ClassesTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->command->info('Data table seeded!');
    }
}
