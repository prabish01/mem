<?php

namespace App\Http\Controllers\Admin;

use App\Model\Product;
use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ChildCategory;
use File;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'=> 'mimes:jpg,jpeg,png,gif'
        ]);
        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/product/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }

        $product = new Product();
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->childcategory_id = $request->input('childcategory_id');
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->mrp = $request->input('mrp');
        $product->dealer_price = $request->input('dealer_price');
        $product->retailer_price = $request->input('retailer_price');
        $product->discount_price = $request->input('discount_price');
        $product->in_stock = $request->input('in_stock');
        $product->available_colors = $request->input('available_colors');
        $product->available_sizes = $request->input('available_sizes');
        $product->image = $name;

        if($product->save()){
            return redirect('admin-product/view')->with('success','Product Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding product.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subCategories = SubCategory::where('category_id', $product->category_id)->get();
        $childCategories = ChildCategory::where('subcategory_id', $product->subcategory_id)->where('category_id', $product->category_id)->get();
        return view('admin.products.edit', compact('product', 'categories','subCategories','childCategories'));
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

        if($request->hasFile('image')) {
            File::delete('uploads/product'.'/'.$product->image);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/product/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $product->image;
        }
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->childcategory_id = $request->input('childcategory_id');
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->mrp = $request->input('mrp');
        $product->dealer_price = $request->input('dealer_price');
        $product->retailer_price = $request->input('retailer_price');
        $product->discount_price = $request->input('discount_price');
        $product->in_stock = $request->input('in_stock');
        $product->available_colors = $request->input('available_colors');
        $product->available_sizes = $request->input('available_sizes');
        $product->image = $name;

        if($product->save()){
            return redirect('admin-product/view')->with('success','Product Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding product.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image = $product->image;
        if($product->delete()){
            File::delete('uploads/product'.'/'.$image);
            return redirect()->back()->with('error', 'Product Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Product Could not be Deleted at this moment.');
        }
    }

    public function enableProduct($id)
    {
        $product = Product::find($id);
        $product->enabled = 1;
        $product->save();
        return redirect()->back()->with('success', 'Product Enabled Successfully');
    }

    public function disableProduct($id)
    {
        $product = Product::find($id);
        $product->enabled = 0;
        $product->save();
        return redirect()->back()->with('success', 'Product Disabled Successfully');
    }

    public function featured($id)
    {
        $product = Product::find($id);
        $product->featured = 1;
        $product->save();
        return redirect()->back()->with('success', 'Product Become Featured Successfully');
    }

    public function notfeatured($id)
    {
        $product = Product::find($id);
        $product->featured = 0;
        $product->save();
        return redirect()->back()->with('success', 'Product Become Unfeatured Successfully');
    }

    public function special($id)
    {
        $product = Product::find($id);
        $product->special = 1;
        $product->save();
        return redirect()->back()->with('success', 'Product Become Special Successfully');
    }

    public function notspecial($id)
    {
        $product = Product::find($id);
        $product->special = 0;
        $product->save();
        return redirect()->back()->with('success', 'Product Become Not Special Successfully');
    }

    public function quickedit(Request $request, $id)
    {
        $product = Product::find($id);
        $product->dealer_price = $request->dealer_price;
        $product->retailer_price =$request->retailer_price;
        $product->in_stock = $request->in_stock;
        $product->featured = $request->featured;
        $product->special = $request->special;
        $product->save();
        return redirect()->back()->with('success', 'Product successfully updated');
    }
}
