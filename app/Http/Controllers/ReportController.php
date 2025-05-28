<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\TypeReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shuchkin\SimpleXLSXGen;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        $type =constant("App\Models\TypeReport::{$request['type_report']}")  ;
        $start_date = $request['start_period'];
        $end_date = $request['end_period'];


        match ($type){
            TypeReport::SALES => $this->sales($start_date, $end_date),
            TypeReport::CATEGORIES => $this->popularCategory($start_date, $end_date),
            TypeReport::STOCK => $this->stockQuantity($start_date, $end_date),
        };
    }

    public function sales($start_date, $end_date)
    {
        $report = [
            ['Продукт', 'Цена продажи за единицу ', 'Общее количество', 'Итоговая сумма продажи'],
        ];

        $results = OrderItem::select('products.product_name',
            DB::raw('order_items.price_at_purchase as price'),
            DB::raw('SUM(order_items.quantity) as quantity'),
            DB::raw('SUM(order_items.price_at_purchase * order_items.quantity) as total'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->whereBetween('order_items.created_at', [$start_date, $end_date])
            ->groupBy('products.product_name', 'order_items.price_at_purchase')
            ->orderBy('products.product_name')
            ->get();

        $results = $results->map(function ($item) {
            return [$item->product_name, $item->price, $item->quantity, $item->total];
        });
        foreach ($results as $row) {
            $report[] = $row;
        }

        $xlsx = SimpleXLSXGen::fromArray($report);
        $xlsx->downloadAs('Продажи.xlsx');
    }

    public function popularCategory($start_date, $end_date)
    {
        $report = [
            ['Категория', 'Общее количество', 'Итоговая сумма продажи'],
        ];

        $results = SubCategory::select('sc.category_name',
            DB::raw('SUM(oi.quantity) as quantity'),
            DB::raw('SUM(oi.quantity * oi.price_at_purchase) as total'))
            ->from('sub_categories as sc')
            ->leftJoin('products as p', 'p.sub_category_id', '=', 'sc.id')
            ->leftJoin('order_items as oi', 'oi.product_id', '=', 'p.id')
            ->whereBetween('oi.created_at', [$start_date, $end_date])
            ->groupBy('sc.category_name')
            ->get();

        $results = $results->map(function ($item) {
            return [$item->category_name, $item->quantity, $item->total];
        });
        foreach ($results as $row) {
            $report[] = $row;
        }

        $xlsx = SimpleXLSXGen::fromArray($report);
        $xlsx->downloadAs('Популярные категории.xlsx');
    }

    public function stockQuantity($start_date, $end_date)
    {
        $report = [
            ['Категория', 'Продукт', 'Цена руб.', 'Остаток'],
        ];

        $results = Product::select('sc.category_name', 'p.product_name', 'p.price', 'p.stock_quantity')
            ->from('products as p')
            ->join('sub_categories as sc', 'sc.id', '=', 'p.sub_category_id')
            ->where('p.stock_quantity', '>', 0)
            ->orderBy('sc.category_name')
            ->orderBy('p.product_name')
            ->get();

        $results = $results->map(function ($item) {
            return [$item->category_name, $item->product_name, $item->price, $item->stock_quantity];
        });
        foreach ($results as $row) {
            $report[] = $row;
        }

        $xlsx = SimpleXLSXGen::fromArray($report);
        $xlsx->downloadAs('Остатки.xlsx');
    }
}
