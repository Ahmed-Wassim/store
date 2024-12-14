<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductService
{

    public function index()
    {
        $products = Product::with(['category', 'images'])->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'category_id' => 'required|integer',
                'price' => 'required|numeric',
            ]);

            // Store the product
            $product = Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'category_id' => $validatedData['category_id'],
                'price' => $validatedData['price'],
                'user_id' => Auth::user()->id,
            ]);

            // Store product images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('products', 'public');
                    $product->images()->create(['path' => $path]);
                }
            }

            return redirect()->route('dashboard.products.index')->with('success', 'Product created successfully',);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.products.index')->with('error', $e->getMessage());
        }
    }

    // Method to display the edit form
    public function edit($product)
    {
        $product = Product::with(['category', 'images'])->findOrFail($product->id);
        $categories = \App\Models\Category::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    // Method to handle the product update
    public function update(Request $request, $product)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('images')) {
            if ($product->images()->exists()) {
                foreach ($product->images as $existingImage) {
                    // dd(Storage::disk('public')->delete($existingImage->path));
                    Storage::disk('public')->delete($existingImage->path);
                    $existingImage->delete();
                }
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($product)
    {
        // Delete images associated with the product
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        // Delete the product itself
        $product->delete();

        return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully');
    }
}
