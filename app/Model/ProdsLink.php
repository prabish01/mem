<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProdsLink extends Model
{
    protected $fillable = ['prods_id','filename','title'];
    
    public function parentProds()
    {
         return $this->belongsTo(Prods::class, 'prods_id');
    }
}
