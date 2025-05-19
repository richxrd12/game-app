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

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'richard@gmail.com',
            'password' => '12345678'
        ]);

        $user->addresses()->create([
            'country' => 'Spain',
            'city' => 'LPGC',
            'postal_code' => '35012',
            'street' => 'Calle Loquetes',
            'street_number' => '7',
            'floor' => '2ndo',
            'door_number' => '2F'
        ]);

        // Crear estados si no existen
        if (ProductStatus::count() === 0) {
            ProductStatus::insert([
                ['name' => 'Nuevo'],
                ['name' => 'Seminuevo'],
                ['name' => 'Usado'],
            ]);
        }

        $statuses = ProductStatus::pluck('id')->toArray();

        $categories = [
            'Nintendo DS',
            'Wii',
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
            Category::firstOrCreate(['name' => $name]);
        }

        
        $products = [
        [
            'image' => 'images/games/1.jpg',
            'name' => 'Super Mario Galaxy',
            'description' => 'Explora el espacio con Mario en una de sus aventuras más originales.',
            'price' => 49.99,
            'product_status_id' => 1,
            'category_id' => 2,
        ],
        [
            'image' => 'images/games/2.png',
            'name' => 'The Legend of Zelda: Breath of the Wild',
            'description' => 'Una épica aventura en un mundo abierto que redefinió la saga.',
            'price' => 59.99,
            'is_discounted' => true,
            'discount' => 10.00,
            'product_status_id' => 1,
            'category_id' => 3,
        ],
        [
            'image' => 'images/games/3.jpg',
            'name' => 'Red Dead Redemption 2',
            'description' => 'Vive el salvaje oeste como Arthur Morgan en esta obra maestra narrativa.',
            'price' => 39.99,
            'product_status_id' => 2,
            'category_id' => 4,
        ],
        [
            'image' => 'images/games/4.png',
            'name' => 'Cyberpunk 2077',
            'description' => 'Sumérgete en Night City como V y descubre un mundo futurista lleno de posibilidades.',
            'price' => 34.95,
            'product_status_id' => 2,
            'category_id' => 7,
        ],
        [
            'image' => 'images/games/5.jpg',
            'name' => 'Elden Ring',
            'description' => 'Un nuevo mundo de fantasía oscura creado por Hidetaka Miyazaki y George R. R. Martin.',
            'price' => 59.95,
            'is_discounted' => true,
            'discount' => 15.00,
            'product_status_id' => 1,
            'category_id' => 5,
        ],
        [
            'image' => 'images/games/6.jpg',
            'name' => 'Resident Evil Village',
            'description' => 'Ethan Winters vuelve a enfrentarse al horror en una aldea maldita.',
            'price' => 49.90,
            'product_status_id' => 1,
            'category_id' => 4,
        ],
        [
            'image' => 'images/games/7.jpg',
            'name' => 'Minecraft',
            'description' => 'Explora, construye y sobrevive en un mundo hecho de bloques.',
            'price' => 26.95,
            'product_status_id' => 2,
            'category_id' => 4,
        ],
        [
            'image' => 'images/games/8.jpg',
            'name' => 'Hollow Knight',
            'description' => 'Un metroidvania desafiante en un mundo subterráneo de insectos y sombras.',
            'price' => 14.99,
            'product_status_id' => 1,
            'category_id' => 3,
        ],
        [
            'image' => 'images/games/9.jpg',
            'name' => 'Final Fantasy VII Remake',
            'description' => 'Revive la historia de Cloud y AVALANCHA con gráficos modernos y combates renovados.',
            'price' => 44.99,
            'product_status_id' => 2,
            'category_id' => 5,
        ],
        [
            'image' => 'images/games/10.jpg',
            'name' => 'Sekiro: Shadows Die Twice',
            'description' => 'Domina el arte del shinobi en esta exigente aventura de acción.',
            'price' => 39.95,
            'is_discounted' => true,
            'discount' => 5.00,
            'product_status_id' => 3,
            'category_id' => 6,
        ],
    ];

        foreach ($products as $data) {
            Product::create($data);
        }


    }
}
