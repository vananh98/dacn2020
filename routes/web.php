<?php

use App\Http\Controllers\typeController;
use Illuminate\Support\Facades\Route;
use App\typeProduct;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
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


Route::get('/', function () {
    return view('welcome');
});

//admin
Route::get('admin', function () {
    return view('admin.login.login');
})->name('adminlogin');
Route::post('loginAdmin', 'adminLoginController@adminLogin')->name('xulidangnhap');
Route::get('logoutAdmin', 'adminLoginController@admidLogout')->name('adminLogout');
//group admin
Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    Route::get('index', function () {
        return view('admin.layout.index');
    })->name('IndexAdmin');

    Route::group(['prefix' => 'users'], function () {
        Route::get('lists', 'UsersController@getListUsers')->name('getAdmin');
        Route::post('lists/find', 'UsersController@listFind')->name('Listfind');

        Route::get('edit/{id}', 'UsersController@getUsers');

        Route::post('edit/{id}', 'UsersController@saveUsers');

        Route::get('add', function () {
            return view('admin.users.add');
        })->name('getAdd');

        Route::post('addUser', 'UsersController@addUsers')->name('addUser');

        Route::get('delete/{id}', 'UsersController@deleteUsers');
    });
    // product
    Route::group(['prefix' => 'products'], function () {
        Route::get('lists', 'productController@getListProducts')->name('getProduct');

        Route::get('edit/{id}', 'productController@getProduct')->name('getIdProduct');

        Route::post('edit/{id}', 'productController@saveProduct')->name('editProduct');

        Route::get('add', 'productController@getTypeProduct')->name('getTypeProduct');

        Route::post('addProduct', 'productController@addProduct')->name('addProdcut');

        Route::get('delete/{id}', 'productController@deleteProduct')->name('deleteProduct');
    });
    //order
    Route::group(['prefix' => 'type'], function () {
        Route::get('lists', 'typeController@listType')->name('listType');

        //ajax remove type
        Route::post('removetype', 'typeController@remove')->name('removeType');

        Route::get('add', 'typeController@getType')->name('getType');

        Route::post('add2', 'typeController@addType')->name('addType');

        Route::get('edit/{id}', 'typeController@editType')->name('editType');

        Route::post('store/{id}', 'typeController@storeType')->name('storeType');

        Route::post('delete/{id}', 'typeController@deleteType')->name('deleteType');
    });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('lists', 'OrdersController@listOrder')->name('listOrder');

        Route::get('edit/{id}', 'OrdersController@editOrder')->name('editOrder');

        Route::post('edit/{id}', 'OrdersController@storeOrder')->name('storeOrder');
        Route::post('update', 'OrdersController@updateOrder')->name('updateOrder');
        Route::get('detailsorder/{id}', 'OrdersController@detailsOrder')->name('detailsOrder');
        Route::get('orderCancel', 'OrdersController@orderCancel')->name('orderCancel');
        Route::post('delete/{id}', 'OrdersController@deleteOrder')->name('deleteOrder');
    });
    //import
    Route::group(['prefix' => 'import'], function () {
        // Route::get('products', 'importController@getForm')->name('importProduct');
        // Route::post('store', 'importController@postForm')->name('importPostForm');
        Route::get('list', 'importController@getList')->name('importList');
        Route::get('detailsImport/{id}', 'importController@detailsImport')->name('detailsImport');
    });
    //report
    Route::group(['prefix' => 'report'], function () {
        Route::get('sales', 'reportController@getForm')->name('reportSale');
        Route::post('sales', 'reportController@getForm')->name('reportSale');
        Route::get('sales/month', 'reportController@formMonth')->name('reportMonth');
        Route::post('sales/month', 'reportController@formMonth')->name('reportMonth');
        Route::get('sales/year', 'reportController@formYear')->name('reportYear');
        Route::post('sales/year', 'reportController@formYear')->name('reportYear');
        Route::get('detailsSale/{year}', 'reportController@detailsYear')->name('detailsYear');
        Route::get('detailsMonthSale/{year}/{month}', 'reportController@detailsMonth')->name('detailsMonth');
        Route::get('detailsDaySale/{year}/{month}/{day}', 'reportController@detailsDay')->name('detailsDay');
    });
    //brands
    Route::group(['prefix' => 'brands'], function () {
        Route::get('lists', 'BrandController@listBrand')->name('listBrand');
        Route::get('edit/{id}', 'BrandController@editBrand')->name('editBrand');

        Route::post('store/{id}', 'BrandController@storeBrand')->name('storeBrand');
        Route::post('update', 'BrandController@updateBrand')->name('updateBrand');
        Route::get('add', 'BrandController@getForm')->name('formAddBrand');
        Route::post('addBrand', 'BrandController@addBrand')->name('addBrand');
        Route::post('removetype', 'BrandController@remove')->name('removeTypeBrand');
    });
    Route::group(['prefix' => 'comments'], function () {
        Route::get('list', 'CommentsController@listCMT')->name('listCmt');
        Route::post('storeCmt', 'CommentsController@storeCMT')->name('storeCMT');
    });
});


//GROUP STAFF
Route::get('staffshipper', function () {
    return view('staff.login');
})->name('staffLogin1');
Route::post('staffLogin', 'staffController@Login')->name('staffLogin');
Route::group(['prefix' => 'staffshipper', 'middleware' => 'staffshipper'], function () {
    Route::get('index', 'staffController@index')->name('staffIndex');
    Route::get('editAccount/{id}', 'staffController@getForm')->name('getFormStaff');
    Route::post('editAccount/{id}', 'staffController@storeStaff')->name('storeStaff');
    Route::get('logout', 'staffController@Logout')->name('stafflogout');
    Route::get('orders', 'staffController@listsOrder')->name('shiporders');
    Route::post('orders/update', 'staffController@updateOrder');
    Route::get('orderCancel', 'staffController@orderCancel')->name('staffOrderCancel');
    Route::get('orderDetails/{id}', 'staffController@orderDetails')->name('stafforderDetails');
});


//GROUP SALE
Route::get('sale', function () {
    return view('sale.login');
})->name('saleLogin');
Route::post('saleLogin', 'SaleController@login')->name('SaleLogin');
Route::group(['prefix' => 'sale', 'middleware' => 'saleMiddleware'], function () {
    Route::get('index', 'SaleController@index')->name('Saleindex');
    Route::get('editAccount/{id}', 'SaleController@getForm')->name('getFormSale');
    Route::post('editAccount/{id}', 'SaleController@storeStaff')->name('storeSale');
    Route::get('logout', 'SaleController@Logout')->name('salelogout');
    Route::get('orders', 'SaleController@listsOrder')->name('saleOrder');
    Route::post('orders/update', 'SaleController@updateOrder');
    Route::get('orderCancel', 'SaleController@orderCancel')->name('SaleOrderCancel');
    Route::get('orderDetails/{id}', 'SaleController@orderDetails')->name('SaleorderDetails');
    Route::get('products', 'SaleController@getFormImport')->name('importProduct');
    Route::post('store', 'SaleController@postFormImport')->name('importPostForm');
});


//Saller
// $type = typeProduct::all();
// View::share('type', $type);
//client
Route::get('login', ['as' => 'login', function () {
    return view('page.login');
}]);
//regis
Route::get('regis', 'clientController@regis')->name('regis');
Route::post('regis2', 'clientController@regis2')->name('regis2');
//login
Route::post('clientLogin', 'clientController@login')->name('clientLogin');
//logout
Route::get('logout', 'clientController@logout')->name('clientLogout');
//trangchu + các trang sản phẩm
Route::get('home', 'MenuController@showMenu')->name('trangchu');
Route::get('category/{id}', 'MenuController@typeMenu')->name('typeMenu');
Route::get('category2find', 'MenuController@findProduct')->name('findProduct');
Route::get('brand{id}/type{id2}', 'MenuController@typeBrand')->name('typeBrand');
Route::get('home/productDiscount', 'MenuController@productDiscount')->name('productDiscount');
Route::get('home/brand{id}', 'MenuController@showDetailsBrand')->name('showDetailsBrand');
Route::get('contact', 'MenuController@contact')->name('contact');
Route::get('home/QA', 'MenuController@question')->name('question');
//detailsProduct
Route::get('simple_product/{id}', 'clientController@details_product')->name('simple_product');
Route::post('comment/{id}', 'clientController@comments')->name('comments');
//cart
Route::get('myaccount/cart', 'CartController@getCart')->middleware('clientLogin')->name('getCart');
Route::post('cart', 'CartController@addCart')->name('cart');
Route::post('store', 'CartController@store')->name('store');
Route::post('remove2', 'CartController@remove')->name('remove');
Route::post('addlive', 'CartController@addlive1')->name('addlive');
//checkout
Route::post('myaccount/checkout', 'CartController@checkOut')->name('checkOut');
//confirm
Route::post('myaccount/confirm', 'CartController@confirm')->name('confirm');
//trangcanhan
Route::get('myaccount', 'clientController@information')->middleware('clientLogin')->name('infor');
Route::get('myaccount/account_details', 'clientController@account')->middleware('clientLogin')->name('account');
Route::post('updateAccount/{id}', 'clientController@update')->middleware('clientLogin')->name('updateAccount');
Route::get('myaccount/orders', 'clientController@getOrders')->middleware('clientLogin')->name('orders');
Route::get('myaccount/ordercanceled', 'clientController@ordercanceled')->middleware('clientLogin')->name('ordersCanceled');
Route::get('myaccount/details_order/{id}', 'clientController@detailsOrder')->middleware('clientLogin')->name('detailsOrderClient');
Route::get('myaccount/gift{id}', 'clientController@formGift')->middleware('clientLogin')->name('formGift');
Route::post('myaccount/giftConfirm{id}', 'clientController@giftConfirm')->middleware('clientLogin')->name('giftConfirm');

//ajax cancel order of client
Route::post('cancel_order', 'clientController@cancel_order')->name('cancel_order');
