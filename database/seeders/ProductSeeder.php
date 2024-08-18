<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Furniture
            ['category_id' => 1, 'name' => 'Luxury Sofa', 'slug' => 'luxury-sofa', 'description' => 'Elegant and comfortable sofa for your living room.', 'meta_title' => 'Luxury Sofa', 'meta_description' => 'High-quality luxury sofa.', 'meta_keywords' => 'sofa, luxury, furniture', 'price' => 999.99, 'status' => true, 'stock' => 20, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 1, 'name' => 'Dining Table', 'slug' => 'dining-table', 'description' => 'Stylish dining table that fits any modern home.', 'meta_title' => 'Dining Table', 'meta_description' => 'Modern dining table.', 'meta_keywords' => 'dining table, furniture', 'price' => 499.99, 'status' => true, 'stock' => 15, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 1, 'name' => 'Office Chair', 'slug' => 'office-chair', 'description' => 'Ergonomic office chair with adjustable height.', 'meta_title' => 'Office Chair', 'meta_description' => 'Comfortable office chair for long hours.', 'meta_keywords' => 'office chair, ergonomic', 'price' => 199.99, 'status' => true, 'stock' => 30, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 1, 'name' => 'Bed Frame', 'slug' => 'bed-frame', 'description' => 'Durable bed frame for a good night’s sleep.', 'meta_title' => 'Bed Frame', 'meta_description' => 'Sturdy bed frame for any bedroom.', 'meta_keywords' => 'bed frame, furniture', 'price' => 299.99, 'status' => true, 'stock' => 25, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 1, 'name' => 'Coffee Table', 'slug' => 'coffee-table', 'description' => 'Modern coffee table with a glass top.', 'meta_title' => 'Coffee Table', 'meta_description' => 'Stylish coffee table for living rooms.', 'meta_keywords' => 'coffee table, modern', 'price' => 149.99, 'status' => true, 'stock' => 40, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 1, 'name' => 'Bookshelf', 'slug' => 'bookshelf', 'description' => 'Spacious bookshelf for your collection.', 'meta_title' => 'Bookshelf', 'meta_description' => 'Elegant bookshelf for home or office.', 'meta_keywords' => 'bookshelf, furniture', 'price' => 249.99, 'status' => true, 'stock' => 10, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 1, 'name' => 'TV Stand', 'slug' => 'tv-stand', 'description' => 'Sturdy TV stand with ample storage.', 'meta_title' => 'TV Stand', 'meta_description' => 'Functional TV stand for living rooms.', 'meta_keywords' => 'TV stand, furniture', 'price' => 179.99, 'status' => true, 'stock' => 20, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 1, 'name' => 'Wardrobe', 'slug' => 'wardrobe', 'description' => 'Spacious wardrobe with multiple compartments.', 'meta_title' => 'Wardrobe', 'meta_description' => 'Large wardrobe for storing clothes.', 'meta_keywords' => 'wardrobe, furniture', 'price' => 399.99, 'status' => true, 'stock' => 5, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 1, 'name' => 'Console Table', 'slug' => 'console-table', 'description' => 'Elegant console table for entryways.', 'meta_title' => 'Console Table', 'meta_description' => 'Stylish console table for any entryway.', 'meta_keywords' => 'console table, furniture', 'price' => 129.99, 'status' => false, 'stock' => 15, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 1, 'name' => 'Ottoman', 'slug' => 'ottoman', 'description' => 'Versatile ottoman for seating or storage.', 'meta_title' => 'Ottoman', 'meta_description' => 'Comfortable ottoman for your home.', 'meta_keywords' => 'ottoman, furniture', 'price' => 89.99, 'status' => false, 'stock' => 10, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 1, 'name' => 'Recliner Chair', 'slug' => 'recliner-chair', 'description' => 'Comfortable recliner chair for relaxation.', 'meta_title' => 'Recliner Chair', 'meta_description' => 'Luxurious recliner chair for home.', 'meta_keywords' => 'recliner, chair', 'price' => 349.99, 'status' => false, 'stock' => 5, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],

            // Electronics
            ['category_id' => 2, 'name' => 'Smartphone', 'slug' => 'smartphone', 'description' => 'Latest smartphone with high-resolution camera.', 'meta_title' => 'Smartphone', 'meta_description' => 'Top smartphone with great features.', 'meta_keywords' => 'smartphone, electronics', 'price' => 699.99, 'status' => true, 'stock' => 30, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 2, 'name' => 'Laptop', 'slug' => 'laptop', 'description' => 'High-performance laptop for work and play.', 'meta_title' => 'Laptop', 'meta_description' => 'Powerful laptop with the latest specs.', 'meta_keywords' => 'laptop, electronics', 'price' => 1299.99, 'status' => true, 'stock' => 25, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 2, 'name' => 'Smartwatch', 'slug' => 'smartwatch', 'description' => 'Advanced smartwatch with health tracking features.', 'meta_title' => 'Smartwatch', 'meta_description' => 'Smartwatch with fitness tracking.', 'meta_keywords' => 'smartwatch, electronics', 'price' => 199.99, 'status' => true, 'stock' => 50, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 2, 'name' => 'Headphones', 'slug' => 'headphones', 'description' => 'Noise-canceling headphones with high sound quality.', 'meta_title' => 'Headphones', 'meta_description' => 'Premium headphones for music lovers.', 'meta_keywords' => 'headphones, electronics', 'price' => 149.99, 'status' => true, 'stock' => 40, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 2, 'name' => 'Tablet', 'slug' => 'tablet', 'description' => 'Portable tablet with a high-resolution screen.', 'meta_title' => 'Tablet', 'meta_description' => 'Versatile tablet for work and play.', 'meta_keywords' => 'tablet, electronics', 'price' => 399.99, 'status' => true, 'stock' => 20, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 2, 'name' => 'Camera', 'slug' => 'camera', 'description' => 'High-quality digital camera for photography enthusiasts.', 'meta_title' => 'Camera', 'meta_description' => 'Advanced camera for professional photos.', 'meta_keywords' => 'camera, electronics', 'price' => 899.99, 'status' => true, 'stock' => 15, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 2, 'name' => 'Smart TV', 'slug' => 'smart-tv', 'description' => '4K Smart TV with streaming capabilities.', 'meta_title' => 'Smart TV', 'meta_description' => '4K Smart TV with streaming apps.', 'meta_keywords' => 'TV, smart', 'price' => 1499.99, 'status' => true, 'stock' => 10, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 2, 'name' => 'Projector', 'slug' => 'projector', 'description' => 'High-definition projector for home theater.', 'meta_title' => 'Projector', 'meta_description' => 'Projector for a cinematic experience.', 'meta_keywords' => 'projector, electronics', 'price' => 599.99, 'status' => false, 'stock' => 8, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 2, 'name' => 'VR Headset', 'slug' => 'vr-headset', 'description' => 'Immersive VR headset for gaming and entertainment.', 'meta_title' => 'VR Headset', 'meta_description' => 'Virtual reality headset for an immersive experience.', 'meta_keywords' => 'VR, headset', 'price' => 299.99, 'status' => false, 'stock' => 12, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],

            // Fashion
            ['category_id' => 3, 'name' => 'Leather Jacket', 'slug' => 'leather-jacket', 'description' => 'Stylish leather jacket perfect for any season.', 'meta_title' => 'Leather Jacket', 'meta_description' => 'High-quality leather jacket.', 'meta_keywords' => 'jacket, fashion', 'price' => 199.99, 'status' => true, 'stock' => 40, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 3, 'name' => 'Designer Dress', 'slug' => 'designer-dress', 'description' => 'Elegant designer dress for special occasions.', 'meta_title' => 'Designer Dress', 'meta_description' => 'Beautiful designer dress.', 'meta_keywords' => 'dress, fashion', 'price' => 299.99, 'status' => true, 'stock' => 10, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 3, 'name' => 'Sneakers', 'slug' => 'sneakers', 'description' => 'Comfortable sneakers for everyday wear.', 'meta_title' => 'Sneakers', 'meta_description' => 'Casual sneakers for any occasion.', 'meta_keywords' => 'sneakers, fashion', 'price' => 89.99, 'status' => true, 'stock' => 60, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 3, 'name' => 'Sunglasses', 'slug' => 'sunglasses', 'description' => 'Trendy sunglasses with UV protection.', 'meta_title' => 'Sunglasses', 'meta_description' => 'Stylish sunglasses for sunny days.', 'meta_keywords' => 'sunglasses, fashion', 'price' => 59.99, 'status' => true, 'stock' => 50, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 3, 'name' => 'Watch', 'slug' => 'watch', 'description' => 'Elegant watch to complement any outfit.', 'meta_title' => 'Watch', 'meta_description' => 'Sophisticated watch for all occasions.', 'meta_keywords' => 'watch, fashion', 'price' => 149.99, 'status' => true, 'stock' => 25, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 3, 'name' => 'Handbag', 'slug' => 'handbag', 'description' => 'Stylish handbag for everyday use.', 'meta_title' => 'Handbag', 'meta_description' => 'Fashionable handbag with ample space.', 'meta_keywords' => 'handbag, fashion', 'price' => 199.99, 'status' => true, 'stock' => 15, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 3, 'name' => 'Scarf', 'slug' => 'scarf', 'description' => 'Warm and stylish scarf for cold weather.', 'meta_title' => 'Scarf', 'meta_description' => 'Soft and cozy scarf for winter.', 'meta_keywords' => 'scarf, fashion', 'price' => 29.99, 'status' => true, 'stock' => 70, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 3, 'name' => 'Trousers', 'slug' => 'trousers', 'description' => 'Comfortable trousers for casual or formal wear.', 'meta_title' => 'Trousers', 'meta_description' => 'Versatile trousers for any occasion.', 'meta_keywords' => 'trousers, fashion', 'price' => 79.99, 'status' => true, 'stock' => 30, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 3, 'name' => 'Blazer', 'slug' => 'blazer', 'description' => 'Tailored blazer for a polished look.', 'meta_title' => 'Blazer', 'meta_description' => 'Elegant blazer for professional settings.', 'meta_keywords' => 'blazer, fashion', 'price' => 149.99, 'status' => false, 'stock' => 20, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 3, 'name' => 'Belt', 'slug' => 'belt', 'description' => 'Stylish belt to complete any outfit.', 'meta_title' => 'Belt', 'meta_description' => 'High-quality belt with a sleek design.', 'meta_keywords' => 'belt, fashion', 'price' => 39.99, 'status' => false, 'stock' => 45, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],

            // Toys
            ['category_id' => 4, 'name' => 'Action Figure', 'slug' => 'action-figure', 'description' => 'Collectible action figure with detailed design.', 'meta_title' => 'Action Figure', 'meta_description' => 'Fun action figure for kids.', 'meta_keywords' => 'toys, action figure', 'price' => 29.99, 'status' => true, 'stock' => 50, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 4, 'name' => 'Building Blocks', 'slug' => 'building-blocks', 'description' => 'Creative building blocks set for kids.', 'meta_title' => 'Building Blocks', 'meta_description' => 'Educational building blocks.', 'meta_keywords' => 'toys, building blocks', 'price' => 49.99, 'status' => true, 'stock' => 35, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 4, 'name' => 'Toy Car', 'slug' => 'toy-car', 'description' => 'Remote-controlled toy car for hours of fun.', 'meta_title' => 'Toy Car', 'meta_description' => 'Remote-controlled toy car for kids.', 'meta_keywords' => 'toy car, toys', 'price' => 59.99, 'status' => true, 'stock' => 40, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 4, 'name' => 'Dollhouse', 'slug' => 'dollhouse', 'description' => 'Beautiful dollhouse with furniture and accessories.', 'meta_title' => 'Dollhouse', 'meta_description' => 'Interactive dollhouse for imaginative play.', 'meta_keywords' => 'dollhouse, toys', 'price' => 149.99, 'status' => true, 'stock' => 20, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 4, 'name' => 'Puzzle Set', 'slug' => 'puzzle-set', 'description' => 'Engaging puzzle set for cognitive development.', 'meta_title' => 'Puzzle Set', 'meta_description' => 'Challenging puzzles for kids.', 'meta_keywords' => 'puzzle, toys', 'price' => 19.99, 'status' => true, 'stock' => 60, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 4, 'name' => 'Stuffed Animal', 'slug' => 'stuffed-animal', 'description' => 'Soft and cuddly stuffed animal for kids.', 'meta_title' => 'Stuffed Animal', 'meta_description' => 'Adorable stuffed animal for children.', 'meta_keywords' => 'stuffed animal, toys', 'price' => 39.99, 'status' => true, 'stock' => 55, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 4, 'name' => 'Educational Tablet', 'slug' => 'educational-tablet', 'description' => 'Tablet designed for educational purposes.', 'meta_title' => 'Educational Tablet', 'meta_description' => 'Tablet with educational apps for kids.', 'meta_keywords' => 'educational tablet, toys', 'price' => 129.99, 'status' => true, 'stock' => 15, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 4, 'name' => 'Play Kitchen Set', 'slug' => 'play-kitchen-set', 'description' => 'Interactive play kitchen set with accessories.', 'meta_title' => 'Play Kitchen Set', 'meta_description' => 'Fun kitchen set for imaginative play.', 'meta_keywords' => 'play kitchen, toys', 'price' => 99.99, 'status' => false, 'stock' => 10, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 4, 'name' => 'Train Set', 'slug' => 'train-set', 'description' => 'Classic train set with tracks and accessories.', 'meta_title' => 'Train Set', 'meta_description' => 'Toy train set for children.', 'meta_keywords' => 'train set, toys', 'price' => 79.99, 'status' => false, 'stock' => 25, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 4, 'name' => 'Remote-Controlled Helicopter', 'slug' => 'remote-controlled-helicopter', 'description' => 'High-flying remote-controlled helicopter.', 'meta_title' => 'Remote-Controlled Helicopter', 'meta_description' => 'Exciting remote-controlled helicopter for kids.', 'meta_keywords' => 'helicopter, toys', 'price' => 89.99, 'status' => false, 'stock' => 20, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 4, 'name' => 'Magic Kit', 'slug' => 'magic-kit', 'description' => 'Magic kit with tricks and accessories.', 'meta_title' => 'Magic Kit', 'meta_description' => 'Magician’s kit for aspiring performers.', 'meta_keywords' => 'magic kit, toys', 'price' => 59.99, 'status' => false, 'stock' => 30, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],

            // Books
            ['category_id' => 5, 'name' => 'Fiction Book', 'slug' => 'fiction-book', 'description' => 'Bestselling fiction book by a renowned author.', 'meta_title' => 'Fiction Book', 'meta_description' => 'Engaging fiction book for readers.', 'meta_keywords' => 'fiction book, books', 'price' => 19.99, 'status' => true, 'stock' => 50, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 5, 'name' => 'Non-Fiction Book', 'slug' => 'non-fiction-book', 'description' => 'Informative non-fiction book on a popular topic.', 'meta_title' => 'Non-Fiction Book', 'meta_description' => 'Educational non-fiction book for readers.', 'meta_keywords' => 'non-fiction book, books', 'price' => 24.99, 'status' => true, 'stock' => 40, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 5, 'name' => 'Children’s Book', 'slug' => 'childrens-book', 'description' => 'Colorful children’s book with interactive elements.', 'meta_title' => 'Children’s Book', 'meta_description' => 'Fun children’s book for young readers.', 'meta_keywords' => 'children’s book, books', 'price' => 14.99, 'status' => true, 'stock' => 60, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 5, 'name' => 'Cookbook', 'slug' => 'cookbook', 'description' => 'Popular cookbook with delicious recipes.', 'meta_title' => 'Cookbook', 'meta_description' => 'Tasty recipes in a cookbook.', 'meta_keywords' => 'cookbook, books', 'price' => 29.99, 'status' => true, 'stock' => 30, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 5, 'name' => 'Self-Help Book', 'slug' => 'self-help-book', 'description' => 'Motivational self-help book for personal growth.', 'meta_title' => 'Self-Help Book', 'meta_description' => 'Inspirational self-help book for readers.', 'meta_keywords' => 'self-help book, books', 'price' => 19.99, 'status' => true, 'stock' => 20, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 5, 'name' => 'Travel Book', 'slug' => 'travel-book', 'description' => 'Travel guidebook with tips and recommendations.', 'meta_title' => 'Travel Book', 'meta_description' => 'Informative travel book for adventurers.', 'meta_keywords' => 'travel book, books', 'price' => 24.99, 'status' => true, 'stock' => 25, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 5, 'name' => 'Art Book', 'slug' => 'art-book', 'description' => 'Beautiful art book featuring famous artworks.', 'meta_title' => 'Art Book', 'meta_description' => 'Art book with stunning illustrations.', 'meta_keywords' => 'art book, books', 'price' => 34.99, 'status' => true, 'stock' => 15, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 5, 'name' => 'History Book', 'slug' => 'history-book', 'description' => 'Detailed history book on a specific era or event.', 'meta_title' => 'History Book', 'meta_description' => 'Informative history book for readers.', 'meta_keywords' => 'history book, books', 'price' => 29.99, 'status' => true, 'stock' => 35, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 5, 'name' => 'Science Book', 'slug' => 'science-book', 'description' => 'Engaging science book with fascinating facts.', 'meta_title' => 'Science Book', 'meta_description' => 'Educational science book for readers.', 'meta_keywords' => 'science book, books', 'price' => 24.99, 'status' => true, 'stock' => 45, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
            ['category_id' => 5, 'name' => 'Poetry Book', 'slug' => 'poetry-book', 'description' => 'Collection of poems by a renowned poet.', 'meta_title' => 'Poetry Book', 'meta_description' => 'Beautiful poetry book for readers.', 'meta_keywords' => 'poetry book, books', 'price' => 19.99, 'status' => true, 'stock' => 55, 'thumbnail' => 'https://biggardenfurniture.com.au/wp-content/uploads/2018/08/img-placeholder.png'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
