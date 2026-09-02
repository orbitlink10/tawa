<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'short_description',
        'description',
        'meta_title',
        'meta_description',
        'is_active',
        'noindex',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'noindex' => 'boolean',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getMetaTitleAttribute($value)
    {
        if (! empty($value)) {
            return $value;
        }

        return $this->name.' Products in Kenya | Tawa';
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function (Brand $brand) {
            if (empty($brand->slug)) {
                $brand->slug = Str::slug($brand->name);
            }
        });

        static::updating(function (Brand $brand) {
            if (empty($brand->slug)) {
                $brand->slug = Str::slug($brand->name);
            }
        });
    }
}
