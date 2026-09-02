<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'slug', 'image_url'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Resolved image source: external URL > placeholder.
     */
    public function getImageSrcAttribute(): string
    {
        if (! empty($this->image_url)) {
            return $this->image_url;
        }

        return asset('lucare/assets/imgs/shop/product-placeholder.svg');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($sub_category) {
            if (empty($sub_category->slug)) {
                $sub_category->slug = Str::slug($sub_category->name);
            }
        });
        static::updating(function ($sub_category) {
            if (empty($sub_category->slug)) {
                $sub_category->slug = Str::slug($sub_category->name);
            }
        });
    }
}
