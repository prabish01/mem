<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getImageAltAttribute()
    {
        $parts = [
            $this->name,
            $this->brand,
            $this->category->name,
            $this->model ?? '',
            $this->year ?? ''
        ];

        return implode(' - ', array_filter($parts));
    }
}
