<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CataloguePages extends Model
{
    
    protected $fillable = ['catalogue_id','filename'];
    public function parentCatalogue()
    {
         return $this->belongsTo(Catalogue::class, 'catalogue_id');
    }
}
