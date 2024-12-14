<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{
    public function index()
    {
        $categories = Category::tree();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            Category::create($request->all());

            flash()->success('Category created successfully');

            return redirect()->route('dashboard.categories.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    public function update(Request $request, Category $category)
    {
        try {
            $category->update($request->all());

            flash()->success('Category updated successfully');

            return redirect()->route('dashboard.categories.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();

            flash()->success('Category deleted successfully');

            return redirect()->route('dashboard.categories.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}
