<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Faq; 
use Illuminate\Http\Request;

class FaqAPIController extends Controller
{ 
    public function index()
    {
        return Faq::all();
    } 
   
}
