<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Model\Partner; 
use Illuminate\Http\Request;

class PartnerAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Partner::all();
    } 
 
}
