<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;
class MarcaSheeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 1500; $i++) { 
            Marca::create([
                'nombre' => 'Marca ' . $i,
            ]);
        }
    }
}
