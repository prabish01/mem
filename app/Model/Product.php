<?php

namespace App\Model;

use Auth;
use App\User;
use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Product extends Model
{
    protected $fillable =
    ['category_id', 'subcategory_id', 'childcategory_id', 'product_name', 'description', 'dealer_price', 'retailer_price', 'in_stock', 'available_colors', 'available_sizes', 'featured', 'special', 'discount_price', 'image', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = static::generateSlug($product->product_name);
        });

        static::updating(function ($product) {
            if ($product->isDirty('product_name')) {
                $product->slug = static::generateSlug($product->product_name);
            }
        });
    }

    protected static function generateSlug($name)
    {
        $slug = str_slug($name);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function parentSubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function parentChildCategory()
    {
        return $this->belongsTo(ChildCategory::class, 'childcategory_id');
    }

    public function UserRole_Price()
    {
        if (Auth::guest()) {
            $price = '';
        } else {
            if (auth()->user()->role_id == '2') {
                $price = $this->dealer_price;
            } elseif (auth()->user()->role_id == '3') {
                $price = $this->retailer_price;
            } elseif (auth()->user()->role_id == '1') {
                $price = $this->retailer_price;
            } else {
                $price = '';
            }
        }
        return $price;
    }
}
