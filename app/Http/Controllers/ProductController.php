<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $products = $this->getProducts($request);

        return view('product.products', compact('categories', 'brands', 'products', 'subcategories'));
    }

    private function getProducts(Request $request)
    {
        $products = Product::query();
        if ($request['search'] != null) {
            $products->whereRaw('lower(product_name) LIKE \'%' . strtolower($request->search) . '%\'');
        }
        if ($request['brand'] != null) {
            $products->whereIn('brand_id', $request['brand']);
        }
        if ($request['subcategory'] != null) {
            $products->whereIn('sub_category_id', $request['subcategory']);
        }
        if ($request['category'] != null) {
            $products->join('sub_categories', 'products.sub_category_id', 'sub_categories.id')
                ->whereIn('sub_categories.category_id', $request['category'])
                ->select('products.*');
        }
        return $products->get();
    }

    public function getProduct(int $id): View
    {
        $products = Product::all()->where('stock_quantity', '>', '0')->take(5);
        $product = Product::all()->where('id', $id)->first();
        return view('product.product', compact('product', 'products'));
    }

    public function showCreate(): View
    {
        $categories = SubCategory::all();
        $brands = Brand::all();
        return view('product.product-create', compact('categories', 'brands'));
    }

    public function create(Request $request)
    {
        $image = $request->file('image');
        $filename = time() . "_" . preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
        $tmp = $image->storeAs('products', $filename);

        $request['image_url'] = $tmp;

        Product::create($request->all());

        return back()->with('status', 'Изменения сохранены');
    }

    public function showEdit(int $id): View
    {
        $categories = SubCategory::all();
        $brands = Brand::all();
        $product = Product::all()->where('id', $id)->first();
        return view('product.product-edit', compact('product', 'categories', 'brands'));
    }

    public function edit(int $id, Request $request)
    {
        $image = $request->file('image');
        if ($image != null) {
            $image = $request->file('image');
            $filename = time() . "_" . preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
            $tmp = $image->storeAs('products', $filename);

            $request['image_url'] = $tmp;
        }

        $product = Product::find($id);
        $product->update($request->all());

        return back()->with('status', 'Изменения сохранены');
    }

    public function delete(int $id): RedirectResponse
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products');
    }
}
