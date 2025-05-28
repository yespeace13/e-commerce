<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_name' => 'Деревянный конструктор',
                'description' => 'Экологически чистый конструктор для детей от 3 лет.',
                'price' => 290.99,
                'sub_category_id' => 6, // ID подкатегории "Конструкторы"
                'stock_quantity' => 50,
                'image_url' => 'products/1742812790_constructor.jpg',
                'age_group' => '3-7 лет',
                'brand_id' => 1,
            ],
            [
                'product_name' => 'Кукла "Анна"',
                'description' => 'Мягкая кукла для девочек от 2 лет.',
                'price' => 190.99,
                'sub_category_id' => 9, // ID подкатегории "Для девочек"
                'stock_quantity' => 30,
                'image_url' => 'products/1742812864_anna.jpg',
                'age_group' => '2-5 лет',
                'brand_id' => 2,
            ],
            [
                'product_name' => 'Плюшевый мишка',
                'description' => 'Мягкая игрушка для малышей.',
                'price' => 150.99,
                'sub_category_id' => 1, // ID подкатегории "Для новорожденных"
                'stock_quantity' => 40,
                'image_url' => 'products/teddy-item.jpg',
                'age_group' => '0-3 лет',
                'brand_id' => 3,
            ],
            [
                'product_name' => 'Набор LEGO City',
                'description' => 'Конструктор для детей от 6 лет.',
                'price' => 490.99,
                'sub_category_id' => 6, // ID подкатегории "Конструкторы"
                'stock_quantity' => 25,
                'image_url' => 'products/lego_city.jpg',
                'age_group' => '6-12 лет',
                'brand_id' => 4,
            ],
            [
                'product_name' => 'Детская коляска',
                'description' => 'Легкая и компактная коляска для прогулок.',
                'price' => 1990.99,
                'sub_category_id' => 14, // ID подкатегории "Прогулочные коляски"
                'stock_quantity' => 10,
                'image_url' => 'products/1742812937_kol.jpg',
                'age_group' => '0-3 лет',
                'brand_id' => 5,
            ],
            [
                'product_name' => 'Автокресло для новорожденных',
                'description' => 'Безопасное автокресло для малышей.',
                'price' => 1290.99,
                'sub_category_id' => 1, // ID подкатегории "Для новорожденных"
                'stock_quantity' => 15,
                'image_url' => 'products/1742812993_child.jpg',
                'age_group' => '0-1 год',
                'brand_id' => 6,
            ],
            [
                'product_name' => 'Книга "Сказки на ночь"',
                'description' => 'Сборник сказок для детей от 2 лет.',
                'price' => 90.99,
                'sub_category_id' => 19, // ID подкатегории "Книги для малышей"
                'stock_quantity' => 60,
                'image_url' => 'products/1742813056_kniga.jpg',
                'age_group' => '2-5 лет',
                'brand_id' => 7,
            ],
            [
                'product_name' => 'Развивающий коврик',
                'description' => 'Коврик с игрушками для развития малышей.',
                'price' => 309.99,
                'sub_category_id' => 1, // ID подкатегории "Для новорожденных"
                'stock_quantity' => 20,
                'image_url' => 'products/1742813100_kover.jpg',
                'age_group' => '0-1 год',
                'brand_id' => 8,
            ],
            [
                'product_name' => 'Детский велосипед',
                'description' => 'Велосипед для детей от 3 лет.',
                'price' => 890.99,
                'sub_category_id' => 3, // ID подкатегории "Для детей 3-7 лет"
                'stock_quantity' => 12,
                'image_url' => 'products/1742813145_bike.jpg',
                'age_group' => '3-7 лет',
                'brand_id' => 9,
            ],
            [
                'product_name' => 'Набор для рисования',
                'description' => 'Набор для творчества для детей от 4 лет.',
                'price' => 2400.99,
                'sub_category_id' => 5, // ID подкатегории "Образовательные игрушки"
                'stock_quantity' => 35,
                'image_url' => 'products/1742813195_risov.jpg',
                'age_group' => '4-7 лет',
                'brand_id' => 3,
            ],
            [
                'product_name' => 'Детская пижама',
                'description' => 'Мягкая пижама для мальчиков.',
                'price' => 1400.99,
                'sub_category_id' => 8, // ID подкатегории "Для мальчиков"
                'stock_quantity' => 50,
                'image_url' => 'products/1742813244_pishama.jpg',
                'age_group' => '2-5 лет',
                'brand_id' => 4,
            ],
            [
                'product_name' => 'Кубики "Алфавит"',
                'description' => 'Деревянные кубики для изучения букв.',
                'price' => 1900.99,
                'sub_category_id' => 5, // ID подкатегории "Образовательные игрушки"
                'stock_quantity' => 40,
                'image_url' => 'products/1742813285_kubiki.jpg',
                'age_group' => '3-5 лет',
                'brand_id' => 5,
            ],
            [
                'product_name' => 'Детский рюкзак',
                'description' => 'Яркий рюкзак для дошкольников.',
                'price' => 2200.99,
                'sub_category_id' => 11, // ID подкатегории "Аксессуары"
                'stock_quantity' => 30,
                'image_url' => 'products/1742813315_rucsac.jpg',
                'age_group' => '3-7 лет',
                'brand_id' => 5,
            ],
            [
                'product_name' => 'Игровая палатка',
                'description' => 'Палатка для игр в помещении.',
                'price' => 3040.99,
                'sub_category_id' => 3, // ID подкатегории "Для детей 3-7 лет"
                'stock_quantity' => 18,
                'image_url' => 'products/1742813363_palatka.jpg',
                'age_group' => '3-7 лет',
                'brand_id' => 6,
            ],
            [
                'product_name' => 'Детский стульчик',
                'description' => 'Стульчик для кормления малышей.',
                'price' => 1590.99,
                'sub_category_id' => 13, // ID подкатегории "Мебель для детской комнаты"
                'stock_quantity' => 10,
                'image_url' => 'products/1742813395_stulchik.jpg',
                'age_group' => '0-3 лет',
                'brand_id' => 6,
            ],
            [
                'product_name' => 'Набор посуды для детей',
                'description' => 'Яркая посуда для малышей.',
                'price' => 3029.99,
                'sub_category_id' => 1, // ID подкатегории "Для новорожденных"
                'stock_quantity' => 25,
                'image_url' => 'products/1742813447_nabo.jpg',
                'age_group' => '1-3 года',
                'brand_id' => 6,
            ],
            [
                'product_name' => 'Детские кроссовки',
                'description' => 'Удобные кроссовки для активных детей.',
                'price' => 2039.99,
                'sub_category_id' => 10, // ID подкатегории "Обувь"
                'stock_quantity' => 20,
                'image_url' => 'products/1742813482_kross.jpg',
                'age_group' => '3-7 лет',
                'brand_id' => 7,
            ],
            [
                'product_name' => 'Мягкий пазл',
                'description' => 'Пазл для малышей из мягкого материала.',
                'price' => 1200.99,
                'sub_category_id' => 5, // ID подкатегории "Образовательные игрушки"
                'stock_quantity' => 45,
                'image_url' => 'products/1742813598_pazl.jpg',
                'age_group' => '2-4 года',
                'brand_id' => 8,
            ],
            [
                'product_name' => 'Детский ночник',
                'description' => 'Ночник с проекцией звезд.',
                'price' => 1900.99,
                'sub_category_id' => 13, // ID подкатегории "Мебель для детской комнаты"
                'stock_quantity' => 15,
                'image_url' => 'products/1742813589_nochnik.jpg',
                'age_group' => '0-3 лет',
                'brand_id' => 9,
            ],
            [
                'product_name' => 'Набор для песочницы',
                'description' => 'Набор для игр в песочнице.',
                'price' => 1400.99,
                'sub_category_id' => 3, // ID подкатегории "Для детей 3-7 лет"
                'stock_quantity' => 30,
                'image_url' => 'products/1742813582_pesok.jpg',
                'age_group' => '3-7 лет',
                'brand_id' => 10,
            ],
        ];

        // Insert products into the database
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
