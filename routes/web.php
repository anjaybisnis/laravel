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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Auth::routes();

//User Routing
// Route::get('/user/all', 'UserController@all');
// Route::put('/user/updateemail/{id}/', 'UserController@updateemail');
// Route::put('/user/updatepassword/{id}/', 'UserController@updatepassword');

/************* User Routes *************/
Route::resource('user', 'UserController');
Route::get('/user/settings/{name}', 'UserController@settings');
Route::get('/user/downloads/{name}', 'UserController@downloads');
Route::get('/user/reviews/{name}', 'UserController@reviews');
Route::get('/user/portfolio/{name}', 'UserController@portfolio');
Route::get('/user/statement/{name}', 'UserController@statement');
Route::get('/user/earnings/{name}', 'UserController@earnings');
Route::get('/user/yearlysalereport/{name}', 'UserController@yearlysalereport');
Route::get('/user/monthlysalereport/{name}', 'UserController@monthlysalereport');
Route::get('/user/allsalereport/{name}', 'UserController@allsalereport');

Route::put('/user/storePersonal/{id}', 'UserController@storePersonal');
Route::put('/user/storeProfileDescription/{id}', 'UserController@storeProfileDescription');
Route::put('/user/storeEmail/{id}', 'UserController@storeEmail');
Route::put('/user/storeCard/{id}', 'UserController@storeCard');
Route::put('/user/storeSocial/{id}', 'UserController@storeSocial');
Route::put('/user/storeAvatar/{id}', 'UserController@storeAvatar');
Route::put('/user/storeCover/{id}', 'UserController@storeCover');

/************* Item Routes *************/
Route::resource('item', 'ItemController');
Route::get('/item/upload/{name}', 'ItemController@upload')->name('item.upload');
Route::delete('/item/dashboardestroy/{id}', 'ItemController@dashboardestroy');

/************* Dashboard Routes *************/
Route::resource('dashboard', 'DashboardController');
Route::put('/dashboard/storeGeneral/{id}', 'DashboardController@storeGeneral');
Route::put('/dashboard/storeHomepage/{id}', 'DashboardController@storeHomepage');
Route::put('/dashboard/storeLoginpage/{id}', 'DashboardController@storeLogingpage');
Route::put('/dashboard/storeWidget/{id}', 'DashboardController@storeWidget');
Route::put('/dashboard/storeSocial/{id}', 'DashboardController@storeSocial');
Route::put('/dashboard/updateCategory/{id}', 'DashboardController@updateCategory');
Route::put('/dashboard/updateUser/{id}', 'DashboardController@updateUser');
Route::post('/dashboard/storeCategory/', 'DashboardController@storeCategory');
Route::get('/dashboard/getCategory/{id}', 'DashboardController@getCategory')->name('getcategory');
Route::get('/dashboard/allitems/{name}', 'DashboardController@allitems')->name('dashbord.allitems');
Route::get('/dashboard/makefeatured/{id}', 'DashboardController@makeFeatured');
Route::get('/dashboard/makefree/{id}', 'DashboardController@makeFree');
Route::get('/dashboard/allusers/{name}', 'DashboardController@allusers')->name('dashbord.allusers');
Route::post('/dashboard/checkusername/', 'DashboardController@checkusername');
Route::post('/dashboard/checkemail/', 'DashboardController@checkemail');
Route::delete('/dashboard/deleteCategory/{id}', 'DashboardController@deleteCategory');

/************* Browse Routes *************/
Route::get('/browse/', 'BrowseController@index');
Route::get('/browse/category/{id}', 'BrowseController@category');
Route::get('/browse/featured', 'BrowseController@featured');
Route::get('/browse/free', 'BrowseController@free');
Route::get('/browse/tags/{tags}', 'BrowseController@tags');

/************* Cart Routes *************/
Route::resource('cart', 'CartController');
Route::put('/cart/updateqty/{id}', 'CartController@updateqty');
Route::post('/cart/itemcartajax/', 'CartController@itemcartajax');

/************* Checkout Routes *************/
Route::resource('checkout', 'CheckoutController');

/************* Payment Routes *************/
Route::resource('payment', 'PaymentController');
Route::get('/payment/success/{any}', 'PaymentController@success')->name('payment.success');

/************* Review Routes *************/
Route::resource('review', 'ReviewController');

/************* Comment Routes *************/
Route::resource('comment', 'CommentController');

/************* Search Routes *************/
Route::resource('search', 'SearchController');
Route::post('/search/search/', 'SearchController@search');

/************* Verify Routes *************/
Route::get('/verify/', 'VerifyController@index');
Route::put('/verify/storePurchasecode/{id}', 'VerifyController@storePurchasecode');
