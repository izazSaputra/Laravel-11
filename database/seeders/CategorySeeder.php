<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(3)->create();

        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan',
            'color' => 'red'
        ]);
        Category::create([
            'name' => 'Lingkungan Hidup',
            'slug' => 'lingkungan',
            'color' => 'green'
        ]);
        Category::create([
            'name' => 'Pembangungan Desa',
            'slug' => 'pembangunan',
            'color' => 'blue'
        ]);
        Category::create([
            'name' => 'Pendidikan dan Kebudayaan',
            'slug' => 'pendidikan',
            'color' => 'gray'
        ]);
        Category::create([
            'name' => 'Sosial dan Kesejahteraan',
            'slug' => 'sosial',
            'color' => 'indigo'
        ]);
        Category::create([
            'name' => 'Politik dan Hukum',
            'slug' => 'politik',
            'color' => 'purple'
        ]);
        Category::create([
            'name' => 'Teknologi Informasi',
            'slug' => 'teknologi',
            'color' => 'yellow'
        ]);
    }
}
