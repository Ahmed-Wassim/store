<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $sliders = Slider::where('type', 'slider')->limit(6)->get();
        $vertical = Slider::where('type', 'vertical')->limit(1)->latest()->first();
        $categories = Category::tree();
        $products = Product::with(['category', 'images'])->limit(12)->get();
        return view('site.index', compact('categories', 'products', 'sliders', 'vertical'));
    }
}
