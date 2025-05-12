<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ProductStatus;
use App\Models\Product;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'richard@gmail.com',
            'password' => '123456'
        ]);

        // Crear estados si no existen
        if (ProductStatus::count() === 0) {
            ProductStatus::insert([
                ['name' => 'Nuevo'],
                ['name' => 'Seminuevo'],
                ['name' => 'Usado'],
            ]);
        }

        // Asegúrate de que existan antes de crear productos
        $statuses = ProductStatus::pluck('id')->toArray();

        $categories = [
            'Nintendo DS',
            'Nintendo Switch',
            'PlayStation 4',
            'PlayStation 5',
            'Xbox One',
            'Xbox Series X',
            'PC',
            'Retro',
            'Accesorios',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }

        // Crear 10 productos con status aleatorio
        Product::factory(10)->create()->each(function ($product) use ($statuses) {
            $product->update([
                'product_status_id' => fake()->randomElement($statuses),
            ]);
        });
    }
}
