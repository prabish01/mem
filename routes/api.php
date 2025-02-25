<?php

use Illuminate\Http\Request;

use App\Http\Controllers\API\AboutAPIController;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\BlogAPIController;
use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\ChildCategoryAPIController;
use App\Http\Controllers\API\FAQAPIController;
use App\Http\Controllers\API\PagesAPIController;
use App\Http\Controllers\API\PartnerAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\SubcategoryAPIController;
use App\Http\Controllers\API\SliderAPIController;
use App\Http\Controllers\API\OrderAPIController;
use App\Http\Controllers\API\ComplainAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/* products API ROUTE */
/* Public Routes */ 
// Route::resource('products', ProductAPIController::class);

//User Start
Route::post('/register', [AuthAPIController::class, 'register']);
Route::post('/registerdealer', [AuthAPIController::class, 'registerDealer']);
Route::post('/login', [AuthAPIController::class, 'login']);
Route::post('/changepassword', [AuthAPIController::class, 'changePassword']);
Route::post('/updateuserinfo', [AuthAPIController::class, 'updateuserinfo']);
Route::post('/updateimage', [AuthAPIController::class, 'updateimage']); 
Route::get('/getuserinfo/{id}', [AuthAPIController::class, 'getUserInfo']); 
Route::get('/getdealerinfo/{id}', [AuthAPIController::class, 'getDealerInfo']); 
Route::post('/updatedealerinfo', [AuthAPIController::class, 'updateDealerInfo']); 
//User END


//Blogs start
Route::get('/blogs', [BlogAPIController::class, 'index']); 
Route::get('/blogs/{id}', [BlogAPIController::class, 'show']);
//Blogs END

// Company About Us Start
Route::get('/about', [AboutAPIController::class, 'index']);
Route::get('/contact', [AboutAPIController::class, 'contact']);
Route::get('/pages', [PagesAPIController::class, 'index']);
Route::get('/partners', [PartnerAPIController::class, 'index']);  
Route::get('/faq', [FAQAPIController::class, 'index']);
// Company About Us Start
 
 
Route::get('/sliders', [SliderAPIController::class, 'index']);

// //Auth Needed Start
// Route::group(['middleware' => ['auth:sanctum']], function () {
    
//products start
Route::get('/products', [ProductAPIController::class, 'index']);

Route::get('/products/{id}', [ProductAPIController::class, 'show']);
Route::get('/products/search/{name}', [ProductAPIController::class, 'search']); 
Route::get('/productsfeatured', [ProductAPIController::class, 'featuredProducts']); 
Route::get('/productsspecial', [ProductAPIController::class, 'specialProducts']);  
Route::get('/productsbyCategory/{id}', [ProductAPIController::class, 'searchProductsbyCategory']);
//products end


//categories start
Route::get('/categories', [CategoryAPIController::class, 'index']);
Route::get('/categories/{id}', [CategoryAPIController::class, 'show']); 
//categories end
//Subcategories start
Route::get('/subcategories', [SubCategoryAPIController::class, 'index']);
Route::get('/subcategories/{id}', [SubCategoryAPIController::class, 'show']); 
Route::get('/subcategoriesbycategory/{id}', [SubCategoryAPIController::class, 'showSubCategoryfromCategory']);
//Subcategories end


//Subcategories start
Route::get('/childcategories', [ChildCategoryAPIController::class, 'index']);
Route::get('/childcategories/{id}', [ChildCategoryAPIController::class, 'show']); 
Route::get('/childcategoriesbycategory/{id}', [ChildCategoryAPIController::class, 'showchildCategoryfromCategory']);
Route::get('/childcategoriesbysubcategory/{id}', [ChildCategoryAPIController::class, 'showchildCategoryfromSubCategory']);

Route::get('/logout', [AuthAPIController::class, 'logout']);
//Subcategories end 
// });
//Auth Needed END

//Order Start
Route::get('/orders/{id}', [OrderAPIController::class, 'getMyOrders']);
Route::get('/getorderdetail/{id}', [OrderAPIController::class, 'getOrderDetail']); 
Route::post('/makeorder', [OrderAPIController::class, 'makeOrder']);
//Order END

//complain Start
Route::post('/complain', [ComplainAPIController::class, 'store'])->name("addcomplain");
Route::get('/complain/{id}', [ComplainAPIController::class, 'show'])->name("showcomplain");;
Route::get('/complainbyuser/{id}', [ComplainAPIController::class, 'index']);
//complain END