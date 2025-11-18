<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::create([
            'name' => 'Gudang Makassar',
            'location' => 'Jl. Jend. Sudirman No. 123, Makassar, Sulawesi Selatan'
        ]);
        
        Warehouse::create([
            'name' => 'Gudang Gowa',
            'location' => 'Jl. Poros Malino No. 45, Gowa, Sulawesi Selatan'
        ]);
        
        Warehouse::create([
            'name' => 'Gudang Barru',
            'location' => 'Jl. Jend. Ahmad Yani No. 78, Barru, Sulawesi Selatan'
        ]);
    }
}
