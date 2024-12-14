<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(10)->create();

        $categories = Category::skip(3)->take(7)->get();

        foreach ($categories as $category) {
            $category->update([
                'parent_id' => random_int(1, 3),
            ]);
        }
    }
}
