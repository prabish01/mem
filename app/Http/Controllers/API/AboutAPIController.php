<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\About; 
use App\Model\Info;
use Illuminate\Http\Request;

class AboutAPIController extends Controller
{ 
    public function index()
    {
        return About::all()->first();
    } 
    public function contact()
    {
        return Info::all()->first();
    }  
}
