<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Model\Page;  
use Illuminate\Http\Request;

class PagesAPIController extends Controller
{ 
    public function index()
    {
        return Page::all();
    } 
   
}
