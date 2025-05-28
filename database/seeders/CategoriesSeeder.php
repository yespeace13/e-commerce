<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Игрушки' => [
                'Для новорожденных',
                'Для детей до 3 лет',
                'Для детей 3-7 лет',
                'Для детей 7-12 лет',
                'Образовательные игрушки',
                'Конструкторы',
            ],
            'Одежда' => [
                'Для новорожденных',
                'Для мальчиков',
                'Для девочек',
                'Обувь',
                'Аксессуары',
            ],
            'Кроватки и мебель' => [
                'Кроватки для новорожденных',
                'Мебель для детской комнаты',
            ],
            'Коляски' => [
                'Прогулочные коляски',
                'Коляски-трансформеры',
            ],
            'Автокресла' => [
                'Для новорожденных',
                'Для детей 1-4 года',
                'Для детей 4-12 лет',
            ],
            'Книги и развивающие материалы' => [
                'Книги для малышей',
                'Развивающие игры и пособия',
            ],
        ];

        foreach ($categories as $parentName => $subcategories) {
            $parentCategory = Category::create(['category_name' => $parentName]);
            foreach ($subcategories as $subcategoryName) {
                SubCategory::create([
                    'category_name' => $subcategoryName,
                    'category_id' => $parentCategory->id,
                ]);
            }
        }
    }
}
