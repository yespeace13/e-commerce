<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('categories.caterories-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string',
            'subcategories' => 'sometimes|array',
        ]);
        $parentCategory = Category::create(['category_name' => $validated['category_name']]);
        foreach ($validated['subcategories'] as $subcatData) {
            SubCategory::create([
                'category_name' => $subcatData['name'],
                'category_id' => $parentCategory->id,
            ]);
        }
        return back()->with('status', 'Запись сохранена'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories.caterories-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_name' => 'required|string',
            'subcategories' => 'sometimes|array',
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->update([
                'category_name' => $validated['category_name']
            ]);

            if (isset($validated['subcategories'])) {
                $existingSubcategoryIds = [];

                foreach ($validated['subcategories'] as $subcatData) {
                    if ($subcatData['id'] === 'new') {
                        $subcategory = SubCategory::insert([
                            'category_name' => $subcatData['name'],
                            'category_id' => $category->id
                        ]);
                        $existingSubcategoryIds[] = $subcategory->id;
                    } else {
                        $subcategory = SubCategory::where('id', '=', $subcatData['id'])
                            ->where('category_id', '=', $category->id)
                            ->firstOrFail();

                        $subcategory->update([
                            'category_name' => $subcatData['name'],
                        ]);
                        // return [$subcategory, $subcatData];
                        $existingSubcategoryIds[] = $subcategory->id;
                    }
                }

                SubCategory::where('category_id', '=', $category->id)
                    ->whereNotIn('id', $existingSubcategoryIds)
                    ->delete();
            }

            DB::commit();

            return back()->with('status', 'Запись обновлена успешно');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Ошибка при обоновлении: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return back();
    }
}
