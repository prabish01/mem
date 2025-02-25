<?php
 Route::get('dashboard', 'DashboardController@index');


 
//End users Route

Route::group(['prefix'=>'endusers'], function()
	{
		Route::get('view', 'EndUserController@index');
		Route::get('delete/{id}', 'EndUserController@destroy');
		Route::get('show/{id}', 'EndUserController@show');
		Route::get('approve-user/{id}', 'EndUserController@approveUser');
		Route::get('disapprove-user/{id}', 'EndUserController@disapproveUser');

	});

//for dealers route
Route::group(['prefix'=>'dealers'], function()
	{
		Route::get('view', 'DealersController@index');
		Route::get('delete/{id}', 'DealersController@destroy');
		Route::get('all-request', 'DealersController@allrequest');
		Route::get('approve-dealer/{id}', 'DealersController@approveDealer');
		Route::get('disapprove-dealer/{id}', 'DealersController@disapproveDealer');
		Route::get('view-details/{id}', 'DealersController@show');

	});
//for categories
Route::group(['prefix'=> 'category'], function()
	{
		Route::get('view', 'CategoryController@index');
		Route::get('delete/{id}', 'CategoryController@destroy');
		Route::get('add', 'CategoryController@create');
		Route::post('store', 'CategoryController@store');
		Route::get('edit/{id}', 'CategoryController@edit');
		Route::put('update/{id}', 'CategoryController@update');

	});

Route::group(['prefix'=> 'subcategory'], function()
	{
		Route::get('view', 'SubCategoryController@index');
		Route::get('delete/{id}', 'SubCategoryController@destroy');
		Route::get('add', 'SubCategoryController@create');
		Route::post('store', 'SubCategoryController@store');
		Route::get('edit/{id}', 'SubCategoryController@edit');
		Route::put('update/{id}', 'SubCategoryController@update');

		Route::get('/allsubcategory/{id}','SubCategoryController@subcategory')->name('subcategory');

	});
	
Route::group(['prefix'=> 'childcategory'], function()
    {
    Route::get('view', 'ChildCategoryController@index');
    Route::get('delete/{id}', 'ChildCategoryController@destroy');
    Route::get('add', 'ChildCategoryController@create');
    Route::post('store', 'ChildCategoryController@store');
    Route::get('show/{id}', 'ChildCategoryController@show');
    Route::get('edit/{id}', 'ChildCategoryController@edit');
    Route::put('update/{id}', 'ChildCategoryController@update');

    Route::get('/allchildcategory/{id}','ChildCategoryController@childcategory')->name('childcategory');


});
Route::group(['prefix'=>'admin-product'], function()
	{
	Route::get('view', 'ProductController@index');
		Route::get('delete/{id}', 'ProductController@destroy');
		Route::get('add', 'ProductController@create');
		Route::post('store', 'ProductController@store');
		Route::get('show/{id}', 'ProductController@show');
		Route::get('edit/{id}', 'ProductController@edit');
		Route::put('update/{id}', 'ProductController@update');
		Route::get('enable/{id}', 'ProductController@enableProduct');
		Route::get('disable/{id}', 'ProductController@disableProduct');
        Route::get('featured/{id}', 'ProductController@featured');
        Route::get('notfeatured/{id}', 'ProductController@notfeatured');
        Route::get('special/{id}', 'ProductController@special');
        Route::get('notspecial/{id}', 'ProductController@notspecial');
		Route::put('quickedit/{id}', 'ProductController@quickedit');

	});

// sliders
Route::group(['prefix'=>'slider'], function()
{
    Route::get('view', 'SliderController@index');
    Route::get('delete/{id}', 'SliderController@destroy');
    Route::get('add', 'SliderController@create');
    Route::post('store', 'SliderController@store');
    Route::get('show/{id}', 'SliderController@show');
    Route::get('edit/{id}', 'SliderController@edit');
    Route::put('update/{id}', 'SliderController@update');
    Route::get('enable/{id}', 'SliderController@enableSlider');
    Route::get('disable/{id}', 'SliderController@disableSlider');

});

// about
Route::group(['prefix'=>'about'], function()
{
    Route::get('view', 'AboutController@index');
    Route::get('delete/{id}', 'AboutController@destroy');
    Route::get('add', 'AboutController@create');
    Route::post('store', 'AboutController@store');
    Route::get('show/{id}', 'AboutController@show');
    Route::get('edit/{id}', 'AboutController@edit');
    Route::put('update/{id}', 'AboutController@update');
});

// our services
Route::group(['prefix'=>'service'], function()
{
    Route::get('view', 'ServiceController@index');
    Route::get('delete/{id}', 'ServiceController@destroy');
    Route::get('add', 'ServiceController@create');
    Route::post('store', 'ServiceController@store');
    Route::get('show/{id}', 'ServiceController@show');
    Route::get('edit/{id}', 'ServiceController@edit');
    Route::put('update/{id}', 'ServiceController@update');
});

// rated Data
Route::group(['prefix'=>'rate'], function()
{
    Route::get('view', 'RatedController@index');
    Route::get('delete/{id}', 'RatedController@destroy');
    Route::get('add', 'RatedController@create');
    Route::post('store', 'RatedController@store');
    Route::get('show/{id}', 'RatedController@show');
    Route::get('edit/{id}', 'RatedController@edit');
    Route::put('update/{id}', 'RatedController@update');
    Route::get('enable/{id}', 'RatedController@enableRated');
    Route::get('disable/{id}', 'RatedController@disableRated');

});

// testimonal
Route::group(['prefix'=>'testimonal'], function()
{
    Route::get('view', 'TestimonalController@index');
    Route::get('delete/{id}', 'TestimonalController@destroy');
    Route::get('add', 'TestimonalController@create');
    Route::post('store', 'TestimonalController@store');
    Route::get('show/{id}', 'TestimonalController@show');
    Route::get('edit/{id}', 'TestimonalController@edit');
    Route::put('update/{id}', 'TestimonalController@update');
});
// partners
Route::group(['prefix'=>'partner'], function()
{
    Route::get('view', 'PartnerController@index');
    Route::get('delete/{id}', 'PartnerController@destroy');
    Route::get('add', 'PartnerController@create');
    Route::post('store', 'PartnerController@store');
    Route::get('show/{id}', 'PartnerController@show');
    Route::get('edit/{id}', 'PartnerController@edit');
    Route::put('update/{id}', 'PartnerController@update');
});

// contact info
Route::group(['prefix'=>'info'], function()
{
    Route::get('view', 'InfoController@index');
    Route::get('add', 'InfoController@create');
    Route::post('store', 'InfoController@store');
    Route::get('edit/{id}', 'InfoController@edit');
    Route::put('update/{id}', 'InfoController@update');

});
// blogs
Route::group(['prefix'=>'blog'], function()
{
    Route::get('view', 'BlogController@index');
    Route::get('delete/{id}', 'BlogController@destroy');
    Route::get('add', 'BlogController@create');
    Route::post('store', 'BlogController@store');
    Route::get('show/{id}', 'BlogController@show');
    Route::get('edit/{id}', 'BlogController@edit');
    Route::put('update/{id}', 'BlogController@update');
});

// faqs
Route::group(['prefix'=>'faq'], function()
{
    Route::get('view', 'FaqController@index');
    Route::get('delete/{id}', 'FaqController@destroy');
    Route::get('add', 'FaqController@create');
    Route::post('store', 'FaqController@store');
    Route::get('show/{id}', 'FaqController@show');
    Route::get('edit/{id}', 'FaqController@edit');
    Route::put('update/{id}', 'FaqController@update');
    Route::get('enable/{id}', 'FaqController@enableFaq');
    Route::get('disable/{id}', 'FaqController@disableFaq');
});

// pages
Route::group(['prefix'=>'page'], function()
{
    Route::get('view', 'PageController@index');
    Route::get('delete/{id}', 'PageController@destroy');
    Route::get('add', 'PageController@create');
    Route::post('store', 'PageController@store');
    Route::get('show/{id}', 'PageController@show');
    Route::get('edit/{id}', 'PageController@edit');
    Route::put('update/{id}', 'PageController@update');
});

// complaints
Route::group(['prefix'=>'complain'], function()
{
    Route::get('view', 'ComplainController@index');
    Route::get('delete/{id}', 'ComplainController@destroy');
    Route::get('show/{id}', 'ComplainController@show');
});
//Route For Orders
Route::group(['prefix'=>'orders'], function()
{
	Route::get('all', 'OrdersController@index');
	Route::get('pending', 'OrdersController@pendingOrders');
	Route::get('delivered', 'OrdersController@deliveredOrders');
	Route::get('view/{id}', 'OrdersController@showDetails');
	Route::get('pdf/{id}', 'OrdersController@generatePDF');
	Route::get('markdelivered/{id}', 'OrdersController@markDelivered');
	Route::get('delete/{id}', 'OrdersController@destroy');
});

//Route for Form data
Route::group(['prefix'=>'form'], function()
	{
		Route::get('contact', 'FormController@contact');
		Route::get('view/{id}', 'FormController@viewmessage');
		Route::get('deletemsg/{id}', 'FormController@deletemsg');

		//route for applied jobs
		Route::get('jobs', 'FormController@job');
		Route::get('viewjobs/{id}', 'FormController@viewjob');
		Route::get('deletejob/{id}', 'FormController@deletejob');
	});

Route::group(['prefix'=>'catalogue'], function()
{
    Route::get('view', 'CatalogueController@index');
    Route::get('delete/{id}', 'CatalogueController@destroy');
    Route::get('add', 'CatalogueController@create');
    Route::post('store', 'CatalogueController@store');
    Route::get('show/{id}', 'CatalogueController@show');
    Route::get('edit/{id}', 'CatalogueController@edit');
    Route::put('update/{id}', 'CatalogueController@update'); 
	Route::get('/pdf/{id}','CatalogueController@pdfdownload');

});


// prods
Route::group(['prefix'=>'prods'], function()
{
    Route::get('view', 'ProdsController@index');
    Route::get('delete/{id}', 'ProdsController@destroy');
    Route::get('add', 'ProdsController@create');
    Route::post('store', 'ProdsController@store');
    Route::get('show/{id}', 'ProdsController@show');
    Route::get('edit/{id}', 'ProdsController@edit');
    Route::put('update/{id}', 'ProdsController@update'); 

});
// prodslink
Route::group(['prefix'=>'prodslink'], function()
{
    Route::get('view', 'ProdsLinkController@index');
    Route::get('delete/{id}', 'ProdsLinkController@destroy');
    Route::get('add', 'ProdsLinkController@create');
    Route::post('store', 'ProdsLinkController@store');
    Route::get('show/{id}', 'ProdsLinkController@show');
    Route::get('edit/{id}', 'ProdsLinkController@edit');
    Route::put('update/{id}', 'ProdsLinkController@update'); 

});


// job vacancy
Route::group(['prefix'=>'job'], function()
{
    Route::get('view', 'JobController@index');
    Route::get('delete/{id}', 'JobController@destroy');
    Route::get('add', 'JobController@create');
    Route::post('store', 'JobController@store');
    Route::get('edit/{id}', 'JobController@edit');
    Route::put('update/{id}', 'JobController@update');
    Route::get('enable/{id}', 'JobController@enableJob');
    Route::get('disable/{id}', 'JobController@disableJob');
});


//Route for Career Form data
Route::group(['prefix'=>'career'], function()
	{
        Route::get('view', 'VacancyController@index');
        Route::get('show/{id}', 'VacancyController@show');
        Route::get('delete/{id}', 'VacancyController@destroy');
		Route::get('/pdf/{id}','VacancyController@pdfdownload');
	});
