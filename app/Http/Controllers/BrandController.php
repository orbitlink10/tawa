<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * All brands landing page.
     */
    public function index()
    {
        $brands = Brand::where('is_active', true)
            ->withCount('products')
            ->orderBy('name')
            ->get();

        return view('theme.'.get_option('theme').'.brands', compact('brands'));
    }

    /**
     * Individual brand landing page.
     */
    public function show(Request $request, $slug)
    {
        $brand = Brand::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $query = $brand->products()
            ->where('is_active', true)
            ->where('product_type', 'product')
            ->with(['category', 'subCategory']);

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->orderBy('id', 'desc')->paginate(24);

        $categories = $brand->products()
            ->where('is_active', true)
            ->where('product_type', 'product')
            ->with('category')
            ->get()
            ->pluck('category')
            ->filter()
            ->unique('id')
            ->values();

        return view('theme.'.get_option('theme').'.brand_single', compact('brand', 'products', 'categories'));
    }
}
