<?php

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

  Auth::routes();

  Route::get('/','LandingController@index')->name('landing');
  Route::get('/shapes/{slug}','LandingController@shapefullView')->name('shapefullview');

Route::prefix('admin')->group(function () {
	  Route::group(['middleware' => ['admin']], function () {
	    Route::resource('dashboard','DashboardController');
	    Route::resource('products','ProductsController');	
	    Route::resource('orders','OrderController');
        Route::get('logout','LogoutController@logout');

	    Route::get('toppings','ToppingController@index')->name('toppings.index');
		Route::get('toppings/edit/{id}','ToppingController@edit')->name('toppings.edit');
		Route::get('toppings/create','ToppingController@create')->name('toppings.create');
		Route::post('toppings/store','ToppingController@store')->name('toppings.store');
		Route::post('toppings/update','ToppingController@update')->name('toppings.update');
		Route::get('toppings/delete/{id}','ToppingController@delete')->name('toppings.delete');
		Route::get('pricing','PriceCalculatorController@index')->name('pricing.index');
		Route::get('pricing/create','PriceCalculatorController@create')->name('pricing.create');
		Route::post('pricing/store','PriceCalculatorController@store')->name('pricing.store');
		Route::get('pricing/edit/{id}','PriceCalculatorController@edit')->name('pricing.edit');
		Route::post('pricing/update','PriceCalculatorController@update')->name('pricing.update');
		Route::get('pricing/delete/{id}','PriceCalculatorController@delete')->name('pricing.delete');
		Route::get('get.product.density','PriceCalculatorController@getProductDensity')->name('get.product.density');

	 });
});

	  // For Front user login check

  //});

	  Route::group(['middleware' => ['auth']], function () { 
       //Route::get('checkout','frontend\CartController@checkout');
	  });

    Route::post('custom/login','CustomLoginController@login');
    Route::resource('cart','frontend\CartController');
    Route::get('checkout','frontend\CartController@checkout');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('rv-list','frontend\RvController@index');
	Route::patch('update-cart', 'frontend\CartController@update');
	Route::delete('remove-cart', 'frontend\CartController@remove');
	Route::post('add-to-cart', 'frontend\CartController@addToCart');

	
	Route::get('logout','LogoutController@frontlogout');


	//paypal route

	Route::get('/paypal/{order?}','PayPalController@form')->name('order.paypal');
	Route::post('/checkout/payment/paypal','frontend\PayPalController@checkout')->name('checkout.payment.paypal');
	Route::get('/paypal/checkout/{order}/completed','frontend\PayPalController@completed')->name('paypal.checkout.completed');
	Route::get('/paypal/checkout/{order}/cancelled','frontend\PayPalController@cancelled')->name('paypal.checkout.cancelled');
	Route::post('/webhook/paypal/{order?}/{env?}','frontend\PayPalController@webhook')->name('webhook.paypal.ipn');
	Route::get('payment-completed/{order}','frontend\PayPalController@paymentCompleted')->name('paymentCompleted');

Route::prefix('Api/v1')->group(function () {
	Route::get('addShapeToCart', 'frontend\CartController@addShapeToCart');
	Route::get('product.firms.get','ApiController@productFirms');
	Route::get('get.product.density','ApiController@getProductDensity')->name('get.product.density');
	//Route::get('product.items.get','ApiController@productItems');
	Route::get('product.price.get','ApiController@calculatePrice');

});

