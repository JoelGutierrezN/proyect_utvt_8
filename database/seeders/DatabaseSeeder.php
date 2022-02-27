<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Joel Gutierrez Nuñez',
            'email' => 'i@admin.com',
            'rank' => 'I',
            'password' => bcrypt('123456')
        ]);
        User::factory(10)->create();
        Product::factory(150)->create();
    }
}
