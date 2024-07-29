<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Sample data for each product
        $products = [
            [
                'name' => 'OLIVIE PLUS 30X (250ML)',
                'qty' => 100,
                'price' => 29.99,
                'desc' => 'Description of OLIVIE PLUS 30X (250ML) product.',
                'product_cover' => 'olivie_plus_30x_250ml.jpg',
            ],
            [
                'name' => 'OLIVIE PLUS 30X MINI (50ML)',
                'qty' => 50,
                'price' => 14.99,
                'desc' => 'Description of OLIVIE PLUS 30X MINI (50ML) product.',
                'product_cover' => 'olivie_plus_30x_mini_50ml.jpg',
            ],
            [
                'name' => 'POMEGRANATE JUICE (200ML)',
                'qty' => 200,
                'price' => 5.99,
                'desc' => 'Description of POMEGRANATE JUICE (200ML) product.',
                'product_cover' => 'pomegranate_juice_200ml.jpg',
            ],
            [
                'name' => 'POMEGRANATE CONCENTRATE (350ML)',
                'qty' => 150,
                'price' => 9.99,
                'desc' => 'Description of POMEGRANATE CONCENTRATE (350ML) product.',
                'product_cover' => 'pomegranate_concentrate_350ml.jpg',
            ],
            [
                'name' => 'POMEGRANATE JUICE (1LT)',
                'qty' => 100,
                'price' => 12.99,
                'desc' => 'Description of POMEGRANATE JUICE (1LT) product.',
                'product_cover' => 'pomegranate_juice_1lt.jpg',
            ],
            [
                'name' => 'POMEGRANATE CORDIAL (500ML)',
                'qty' => 80,
                'price' => 7.99,
                'desc' => 'Description of POMEGRANATE CORDIAL (500ML) product.',
                'product_cover' => 'pomegranate_cordial_500ml.jpg',
            ],
            [
                'name' => 'BLACK SEED OIL (50ML)',
                'qty' => 120,
                'price' => 17.99,
                'desc' => 'Description of BLACK SEED OIL (50ML) product.',
                'product_cover' => 'black_seed_oil_50ml.jpg',
            ],
        ];

        foreach ($products as $product) {
            // Check if the product already exists in the database
            $existingProduct = Products::where('name', $product['name'])->first();

            // If the product exists, delete it
            if ($existingProduct) {
                $existingProduct->delete();
            }

            // Create the new product record
            Products::create($product);
        }
    }
}
