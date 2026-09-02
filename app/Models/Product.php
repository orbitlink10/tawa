<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'sku',
        'model',
        'price',
        'marked_price',
        'has_price',
        'quantity',
        'discount',
        'photo',
        'image_url',
        'slug',
        'description',
        'short_description',
        'specifications',
        'meta_description',
        'meta_title',
        'canonical_url',
        'category_id',
        'sub_category_id',
        'brand_id',
        'stock',
        'stock_status',
        'is_active',
        'featured',
        'noindex',
        'google_merchant',
        'product_type',
    ];

    protected $casts = [
        'specifications' => 'array',
        'is_active' => 'boolean',
        'featured' => 'boolean',
        'noindex' => 'boolean',
        'has_price' => 'boolean',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
            ->withPivot(['quantity', 'price'])
            ->withTimestamps();
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    /**
     * Resolved image source: external manufacturer URL > local upload > placeholder.
     */
    public function getImageSrcAttribute(): string
    {
        if (! empty($this->image_url)) {
            return $this->image_url;
        }
        if (! empty($this->photo)) {
            return asset('storage/' . $this->photo);
        }

        return asset('lucare/assets/imgs/shop/product-placeholder.svg');
    }

    /**
     * Descriptive, unique image ALT text.
     */
    public function getImageAltAttribute(): string
    {
        return $this->name;
    }

    /**
     * Effective SEO title with a sensible, unique fallback.
     */
    public function getMetaTitleAttribute($value)
    {
        if (! empty($value)) {
            return $value;
        }

        return $this->name.' Price in Kenya | Tawa';
    }

    /**
     * Stock availability label derived from stock + stock_status.
     */
    public function getAvailabilityLabelAttribute(): string
    {
        if ($this->stock_status === 'in_stock') {
            return 'In Stock';
        }
        if ($this->stock_status === 'out_of_stock') {
            return 'Out of Stock';
        }
        if ($this->stock_status === 'on_order') {
            return 'On Order / Contact Us';
        }
        if (! empty($this->stock) && $this->stock > 0) {
            return 'In Stock';
        }

        return 'Contact Us';
    }

    public function getIsInStockAttribute(): bool
    {
        if ($this->stock_status === 'in_stock') {
            return true;
        }
        if ($this->stock_status && $this->stock_status !== 'on_order') {
            return false;
        }

        return $this->stock > 0;
    }

    /**
     * Generate a clean product slug from the name + model.
     */
    public static function slugFrom(string $name, ?string $model = null): string
    {
        $base = $model && stripos($name, $model) === false
            ? trim($name.' '.$model)
            : $name;

        return \Illuminate\Support\Str::slug($base);
    }
}
