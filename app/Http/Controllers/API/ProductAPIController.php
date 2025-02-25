<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Model\Product;
use Illuminate\Http\Request;

class ProductAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return Product::select('id','product_name','mrp','dealer_price','retailer_price','featured',
        'special','image')->where('enabled','1')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);

        return Product::create($request->all());
    }
 
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }

     /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Product::select('id','product_name','mrp','dealer_price','retailer_price','featured',
        'special','image')->where('product_name', 'like', '%'.$name.'%')->where('enabled','1')->paginate(10);
    }
    public function featuredProducts()
    {
        return Product::select('id','product_name','mrp','dealer_price','retailer_price','featured',
        'special','image')->where('featured', '1')->where('enabled','1')->paginate(10);
    }
    public function specialProducts()
    {
        return Product::select('id','product_name','mrp','dealer_price','retailer_price','featured',
        'special','image')->where('special', '1')->where('enabled','1')->paginate(10);
    }
    
    public function searchProductsbyCategory($categoryID)
    {
        return Product::select('id','product_name','mrp','dealer_price','retailer_price','featured',
        'special','image')->where('category_id', $categoryID)->where('enabled','1')->paginate(10);
    }
}
