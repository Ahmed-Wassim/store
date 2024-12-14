<?php

namespace App\Services;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function index()
    {
        $sliders = Slider::with('image')->get();
        return view('dashboard.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function store(Request $request)
    {
        $slider = Slider::create($request->all());

        // Store product images
        if ($request->hasFile('image')) {
            $path = $request->image->store('sliders', 'public');
            $slider->image()->create(['path' => $path]);
        }

        flash()->success('Slider created successfully');

        return redirect()->route('dashboard.sliders.index');
    }

    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $slider->update($request->all());

        // Handle image upload
        if ($request->hasFile('image')) {
            // Check if the product already has images
            if ($slider->image()->exists()) {
                // Delete existing images from storage
                Storage::disk('public')->delete($slider->image->path);
                $slider->image->delete(); // Delete the record from the database
            }

            // Upload new images
            $path = $request->image->store('sliders', 'public');
            $slider->image()->create(['path' => $path]);
        }

        flash()->success('Slider updated successfully');

        return redirect()->route('dashboard.sliders.index');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();

        flash()->success('Slider deleted successfully');

        return redirect()->route('dashboard.sliders.index');
    }
}
