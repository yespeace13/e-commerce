<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Contracts\View\View;

class BrandController extends Controller
{
    public function index(): View
    {
        $brands = Brand::all()->whereNotNull('image');
        return view('brands', compact('brands'));
    }
}
