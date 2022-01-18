<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\InternshipDivision;

class InternshipDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $intern = [
            [
                'name' => 'Product',
                'icon' => 'product.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Marketing',
                'icon' => 'marketing.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Creative',
                'icon' => 'creative.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Human Resource',
                'icon' => 'hr.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Finance',
                'icon' => 'finance.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        InternshipDivision::insert($intern);
    }
}
