<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('landing');

Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

//dealer signup route
Route::get('dealersignup', 'Auth\RegisterController@dealersingnupform');
Route::post('registerdealer', 'Auth\RegisterController@registerdealer');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('approval', 'HomeController@approval');
Route::get('/featured/products', 'HomeController@featured')->name('featured');

Route::get('/allproducts/products', 'HomeController@allProducts')->name('allproducts');
//for admin dashboards
Route::group(['middleware' => ['auth', 'admin'], 'as' => 'admin.', 'namespace' => 'Admin'], function () {
	require __DIR__ . '/admin.php';
});

Route::group(['prefix' => 'frontend', 'namespace' => 'Frontend'], function () {
	Route::get('about/us', 'FrontendController@aboutus')->name('about');
	Route::get('career', 'FrontendController@career');
	Route::get('contact/us', 'FrontendController@contact')->name('contact');
	Route::post('sendmail', 'MailController@send');
	Route::post('applyjob', 'MailController@applyjob');
});

//route for products at frontend
Route::group(['prefix' => 'product', 'namespace' => 'Frontend'], function () {
	Route::get('/category/{id}', 'ProductController@category');
	Route::get('/subcategory/{id}', 'ProductController@subcategory');

	Route::get('/childcategory/{id}', 'ProductController@childcategory');
	Route::get('details/{slug}', 'ProductController@show')->name('product.details');
});

//routes for cart
Route::group(['middleware' => ['auth', 'approval'], 'namespace' => 'Frontend', 'prefix' => 'cart'], function () {

	Route::get('list', 'CartController@index');
	Route::post('add/{id}', 'CartController@addtocart');
	Route::get('remove/{rowId}', 'CartController@removeItem');
	Route::get('destroy', 'CartController@destroyCart');

	//Route for checkout
	Route::get('checkout', 'CheckoutController@index');
	Route::post('paymentmethod', 'CheckoutController@PaymentOption');

	//Route for payment methods
	Route::get('cashondelivery', 'CheckoutController@CashOnDelivery');
	Route::get('payByKhalti', 'CheckoutController@khaltipayment');

	//Route for viewing own order
	Route::get('myorders', 'CartController@myorders');
	Route::get('vieworder/{id}', 'CartController@viewOrder');
});
//blogs
Route::get('/blogs', 'Frontend\FrontendController@blog')->name('blogs');
Route::get('/blog/{id}', 'Frontend\FrontendController@singleblog')->name('singleblog');

Route::get('thanku', function () {
	return view('frontend.pages.thanku');
});

Route::get('/privacy/policy', 'Frontend\FrontendController@privacy')->name('privacy');
Route::get('/terms/conditions', 'Frontend\FrontendController@terms')->name('terms');
Route::get('/delivery/info', 'Frontend\FrontendController@delivery')->name('deliveryinfo');
Route::get('/faq', 'Frontend\FrontendController@faq')->name('faq');
Route::get('/payment/policy', 'Frontend\FrontendController@payment')->name('payment');
Route::get('/dealer/policy', 'Frontend\FrontendController@dealer')->name('dealer');
Route::get('/return/policy', 'Frontend\FrontendController@returns')->name('return');

//my care
Route::get('/my/care', 'Frontend\FrontendController@services')->name('services');
Route::post('/complain', 'Frontend\FrontendController@complain')->name('complain');

/*subscription*/
Route::post('/subscribe', 'Frontend\FrontendController@subscribe')->name('subscribe');


// Search products by name
Route::group(['namespace' => 'Frontend', 'prefix' => 'search'], function () {
	Route::post('product', 'SearchController@searchProduct');
});



Route::get('/config-cache', function () {
	$status = Artisan::call('config:cache');
	return '<h1>Configured cached</h1>';
});

Route::get('/config-clear', function () {
	$status = Artisan::call('config:clear');
	return '<h1>Configurations cache cleared</h1>';
});

Route::get('/clear-cache', function () {
	Artisan::call('cache:clear');
	return "Cache is cleared";
});

Route::get('/linkstorage', function () {
	Artisan::call('storage:link');
});


Route::get('/allcatalogues', 'Frontend\FrontCatalogueController@index')->name('allcatalogues');
Route::get('/catalogues/{id}', 'Frontend\FrontCatalogueController@catalogues')->name('catalogues');


//User Dashboard
Route::group(['middleware' => ['auth'], 'namespace' => 'User'], function () {

	Route::get('userdashboard', 'UsersDashboardController@index');
	Route::get('dealerdashboard', 'UsersDashboardController@dealerDashboard');
	Route::Post('updatedealerinfo', 'UsersDashboardController@updateDealerInfo')->name('updatedealerinfo');
	Route::Post('updateuserinfo', 'UsersDashboardController@updateuserinfo')->name('updateuserinfo');

	Route::get('changepassword', 'UsersDashboardController@changePassword');
	Route::get('myorderslist', 'UsersDashboardController@myOrdersList');
	Route::get('showorderdetails/{id}', 'UsersDashboardController@showOrderDetails');
	Route::get('orderpdf/{id}', 'UsersDashboardController@generateorderPDF');
	// Route::get('mycomplainslist', 'UsersDashboardController@myComplainsList'); \

	Route::get('/changePasswordForm', 'UsersDashboardController@changePasswordForm');
	Route::post('/changePassword', 'UsersDashboardController@changePassword')->name('changePassword');
	Route::post('/profilepicchange', 'UsersDashboardController@profilepicchange')->name('profilepicchange');
});

//product detail
Route::get('getprods/view/{slug}', 'Frontend\FrontProdsController@getProdsbyId')->name('getprods');

Route::get('/career', 'HomeController@career')->name('career');
Route::post('/vacancy', 'HomeController@vacancy')->name('vacancy');

Route::get('frontcatalogues/pdf/{id}', 'Frontend\FrontCatalogueController@pdfdownload')->name('cataloguespdf');
