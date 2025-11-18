<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Elektronik',
            'description' => 'Perangkat elektronik seperti laptop, smartphone, dan perangkat rumah tangga'
        ]);
        
        Category::create([
            'name' => 'Pakaian',
            'description' => 'Berbagai jenis pakaian untuk pria, wanita, dan anak-anak'
        ]);
        
        Category::create([
            'name' => 'Makanan & Minuman',
            'description' => 'Produk makanan dan minuman siap saji'
        ]);
        
        Category::create([
            'name' => 'Kesehatan & Kecantikan',
            'description' => 'Produk perawatan tubuh, kosmetik, dan suplemen kesehatan'
        ]);
    }
}
