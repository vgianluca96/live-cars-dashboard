<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['SUV', 'Berlina', 'Station wagoon', '4x4', 'Sport', 'Ecnonomy', 'Time machine'];

        foreach ($categories as $category) {
            $new_cat = new Category();
            $new_cat->name = $category;
            $new_cat->slug = Str::slug($category, '-');
            $new_cat->save();
        }
    }
}
