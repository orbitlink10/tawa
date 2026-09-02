<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'seo_content',
        'meta_description',
        'meta_title',
        'canonical_url',
        'photo',
        'image_url',
        'noindex',
    ];

    use HasFactory;

    protected $casts = [
        'noindex' => 'boolean',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getMetaTitleAttribute($value)
    {
        if (! empty($value)) {
            return $value;
        }

        return $this->name.' Price in Kenya | Tawa';
    }

    /**
     * Resolved image source: external URL > local upload > placeholder.
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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($cat) {
            if (empty($cat->slug)) {
                $cat->slug = Str::slug($cat->name);
            }
        });
        static::updating(function ($cat) {
            if (empty($cat->slug)) {
                $cat->slug = Str::slug($cat->name);
            }
        });
    }
}
