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
    public function run()
    {
        $categories = [
            ['name' => 'Furniture', 'description' => 'High-quality furniture for your home. From sofas to dining tables, find the perfect piece to enhance your living space.', 'status' => true],
            ['name' => 'Electronic', 'description' => 'Latest gadgets and electronics, including smartphones, laptops, and home appliances.', 'status' => true],
            ['name' => 'Fashion', 'description' => 'Trendy clothing and accessories to keep you stylish. Explore the latest in fashion for men, women, and children.', 'status' => true],
            ['name' => 'Toys', 'description' => 'Fun and educational toys for kids of all ages. From action figures to puzzles, find the perfect toy.', 'status' => true],
            ['name' => 'Books', 'description' => 'A wide range of books across genres. Find your next great read or gift a book to a loved one.', 'status' => false], // Inactive category
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
