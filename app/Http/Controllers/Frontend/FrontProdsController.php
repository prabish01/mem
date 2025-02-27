<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Catalogue;
use App\Model\CataloguePages;
use App\Model\Prods;

class FrontProdsController extends Controller
{


    public function getProdsbyId($slug)
    {
        $prods = Prods::where('slug', $slug)->firstOrFail();
        return view('frontend.prods.index', compact('prods'));
    }
}
