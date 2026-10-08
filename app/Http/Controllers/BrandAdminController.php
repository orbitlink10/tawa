<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandAdminController extends Controller
{
    /**
     * Display a listing of the brands.
     */
    public function index()
    {
        $brands = Brand::withCount('products')
            ->orderBy('name')
            ->get();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new brand.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created brand.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        $brand = new Brand();
        $this->fill($brand, $request, $validated, true);
        $brand->save();

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand created successfully!');
    }

    /**
     * Show a brand (redirect to its edit form).
     */
    public function show(Brand $brand)
    {
        return redirect()->route('admin.brands.edit', $brand->id);
    }

    /**
     * Show the form for editing the given brand.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the given brand.
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate($this->rules());

        $this->fill($brand, $request, $validated, false);
        $brand->save();

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand updated successfully!');
    }

    /**
     * Remove the given brand.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand deleted successfully!');
    }

    /**
     * Validation rules shared by store and update.
     */
    private function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:4096',
        ];
    }

    /**
     * Map the request data onto the brand model.
     */
    private function fill(Brand $brand, Request $request, array $validated, bool $isCreate): void
    {
        $brand->name = $validated['name'];
        $slugSource = trim((string) ($validated['slug'] ?? '')) !== ''
            ? $validated['slug']
            : $validated['name'];
        $brand->slug = $this->uniqueSlug($slugSource, $isCreate ? null : $brand->id);
        $brand->short_description = $validated['short_description'] ?? null;
        $brand->description = $validated['description'] ?? null;
        $brand->meta_title = $validated['meta_title'] ?? null;
        $brand->meta_description = $validated['meta_description'] ?? null;
        $brand->is_active = $request->boolean('is_active');
        $brand->noindex = $request->boolean('noindex');

        if ($request->hasFile('logo')) {
            $brand->logo = $this->storeLogo($request->file('logo'));
        }
    }

    /**
     * Build a unique slug for the brand.
     */
    private function uniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $base = Str::slug($value) ?: 'brand';
        $slug = $base;
        $suffix = 2;

        while (Brand::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base . '-' . $suffix++;
        }

        return $slug;
    }

    /**
     * Store the uploaded logo and return its public URL.
     */
    private function storeLogo($file): string
    {
        $extension = strtolower($file->getClientOriginalExtension() ?: 'png');
        $base = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) ?: 'brand';
        $filename = $base . '-' . time() . '.' . $extension;

        $file->storeAs('public/uploads/brands', $filename, 'local');

        return url('storage/uploads/brands/' . $filename);
    }
}
