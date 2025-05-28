<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $productsNew = Product::all()
            ->where('stock_quantity', '>', '0')
            ->sortByDesc('updated_at')
            ->take(5);
        $productsPop = Product::all()
            ->where('stock_quantity', '>', '0')
            ->take(10);
        $brands = Brand::all();
        return view('index', compact('productsNew', 'productsPop', 'brands'));
    }
}
