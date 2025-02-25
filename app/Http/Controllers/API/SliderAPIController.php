<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
 
use App\Model\Slider;
use Illuminate\Http\Request;

class SliderAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Slider::all();
    } 
 
}
