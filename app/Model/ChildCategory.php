<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    protected $fillable = ['category_id','subcategory_id','childcategory_name'];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function parentSubcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
