<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prods extends Model
{
    public function childlink()
    {
        return $this->hasMany(ProdsLink::class);
    }
}
