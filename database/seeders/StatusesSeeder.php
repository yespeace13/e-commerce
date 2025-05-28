<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderStatus::insert([
            ['name' => 'Ожидает оплаты'],
            ['name' => 'Оплачен'],
            ['name' => 'Заказ не завершен'],
        ]);
    }
}
