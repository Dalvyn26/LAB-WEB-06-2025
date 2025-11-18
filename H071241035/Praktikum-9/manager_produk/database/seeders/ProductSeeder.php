<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create products in Electronics category
        $product1 = Product::create([
            'name' => 'Laptop ASUS',
            'price' => 8500000,
            'category_id' => 1
        ]);
        
        $product1->productDetail()->create([
            'description' => 'Laptop gaming ASUS ROG dengan spesifikasi tinggi, RAM 16GB, SSD 512GB',
            'weight' => 2.30,
            'size' => '15.6 inch'
        ]);
        
        $product2 = Product::create([
            'name' => 'Smartphone Samsung Galaxy S23',
            'price' => 12000000,
            'category_id' => 1
        ]);
        
        $product2->productDetail()->create([
            'description' => 'Smartphone flagship Samsung dengan kamera 108MP dan prosesor terbaru',
            'weight' => 0.163,
            'size' => '6.1 inch'
        ]);
        
        // Create products in Clothing category
        $product3 = Product::create([
            'name' => 'Kemeja Formal Pria',
            'price' => 150000,
            'category_id' => 2
        ]);
        
        $product3->productDetail()->create([
            'description' => 'Kemeja formal berkualitas tinggi untuk keperluan kerja dan acara formal',
            'weight' => 0.30,
            'size' => 'L'
        ]);
        
        $product4 = Product::create([
            'name' => 'Celana Jeans Wanita',
            'price' => 250000,
            'category_id' => 2
        ]);
        
        $product4->productDetail()->create([
            'description' => 'Celana jeans stretch modern dengan kenyamanan tinggi',
            'weight' => 0.50,
            'size' => 'M'
        ]);
        
        // Create products in Food & Beverage category
        $product5 = Product::create([
            'name' => 'Biskuit Sari Gandum',
            'price' => 12000,
            'category_id' => 3
        ]);
        
        $product5->productDetail()->create([
            'description' => 'Biskuit sehat terbuat dari sari gandum dan madu alami',
            'weight' => 0.200,
            'size' => '200gr'
        ]);
    }
}
