<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Product;
use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ChildCategory;

class ProductController extends Controller
{
   public function index()
   {
   	 //
   }

   public function show($id)
   {
   	$product = Product::find($id);
   	return view('frontend.products.details', compact('product'));
   }

    //category
    public function category($id)
    {
        $category = Category::select('*')->where('id',$id)->first();
        $products = Product::select('*')->where('enabled','=','1')->where('category_id',$category->id)->paginate(12);
        return view('frontend.products.categorydata')->with([
            'products'=>$products,
            'current_cat_id' => $category->id
        ]);
    }
    //subcategory
    public function subcategory($id)
    {
        $subcategory = SubCategory::select('*')->where('id',$id)->first();
        $products = Product::select('*')->where('enabled','=','1')->where('subcategory_id',$subcategory->id)->paginate(12);
        return view('frontend.products.subcategorydata')->with([
            'products'=>$products,
            'current_subcat_id'=>$subcategory->id
        ]);
    }
    
     //childcategory
       public function childcategory($id)
       {
           $childcategory = ChildCategory::select('*')->where('id',$id)->first();
           $products = Product::select('*')->where('enabled','=','1')->where('childcategory_id',$childcategory->id)->paginate(12);
           return view('frontend.products.childcategorydata')->with([
               'products'=>$products,
               'current_childcat_id'=>$childcategory->id
           ]);
       }
}
