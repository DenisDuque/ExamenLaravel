<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Ciutat;
class CiutatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ciutat::create([
            'nom' => 'Badalona',
            'n_habitants' => 284953,
        ]);

        Ciutat::create([
            'nom' => 'Sant Adrià',
            'n_habitants' => 127938,
        ]);
    }
}
