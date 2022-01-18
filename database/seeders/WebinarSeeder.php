<?php

namespace Database\Seeders;

use App\Models\Webinar;
use Illuminate\Database\Seeder;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $webinar = [
            [
                'name' => 'Career starterpack : how to maximize your public speaking',
                'speaker' => 'Achmad Rafi (CeO & founder gup media)',
                'icon' => 'product.png',
                'timeline' => '2022-01-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Career starterpack : Organisasi atau kuliah aja?',
                'speaker' => 'Suci Intan illahi (COO & Co-founder gup media)',
                'icon' => 'creative.png',
                'timeline' => '2022-01-27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Career starterpack : Time Management',
                'speaker' => 'Mutiara Putri N. H. (CTO & co-founder GUP media)',
                'icon' => 'marketing.png',
                'timeline' => '2022-01-27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Career starterpack : Building a strategy to get a scholarship Management',
                'speaker' => 'Kanza Azzahra (CCO & co-founder gup media)',
                'icon' => 'finance.png',
                'timeline' => '2022-01-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Webinar::insert($webinar);
    }
}
