<?php

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AccomodationController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\SearchController;
//use App\Http\Controllers\ManageController;
use App\Http\Controllers\CommisionerController;
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

Route::view('head','head');
Route::view('about','about');
Route::view('inde','inde');
Route::view('regst','regst');
Route::view('buysalerent','buysalerent');
Route::view('property_details','property_details');



Route::get('rentt', function () {
    return view('rent');
});

Route::view('login','AdminLogin');
Route::view('Plot','Plot');
Route::post('Admin_login',[LoginController::class
,'login']);

// post routes
Route::post('post_form',[PropertyController::class, 'post_form']);
Route::post('property_insert',[PropertyController::class, 'store']);
Route::post('property_edit',[PropertyController::class, 'edit']);
Route::post('user_home',[PropertyController::class, 'user']);
Route::post('user_rent',[RentController::class, 'user']);
Route::post('user_sale',[SaleController::class, 'user']);
Route::post('user_details', [DetailController::class, 'user'])->name('user_details');


Route::post('detail',[DetailController::class,'store']);
Route::post('requests',[RequestController::class,'store']);




// Gets Routes
Route::get('/',[PropertyController::class,'show']);
Route::get('listed',[PropertyController::class,'listed']);
Route::get('rent',[RentController::class,'show']);
Route::get('sale',[SaleController::class,'show']);
Route::get('accommodation',[AccomodationController::class,'show']);




Route::get('/search-properties', [PropertyController::class, 'search'])->name('searchProperties');
Route::get('detail_get',[DetailController::class,'show']);
Route::get('mng',[RequestController::class,'show']);
Route::get('plot',[PlotController::class,'show']);
Route::post('property_search', [SearchController::class,'properties_search']);
Route::get('manage_get',[ManageController::class, 'manage']);

Route::post('customer',[CommisionerController::class,'store']);
Route::post('user_login',[CommisionerController::class,'login']);
Route::post('data_get',[CommisionerController::class,'show']);

//delete
Route::delete('/property/{id}', [PropertyController::class,'destroy'])->name('property.destroy');

//update
Route::put('/property/{propertyId}', [PropertyController::class,'update'])->name('property.update');




