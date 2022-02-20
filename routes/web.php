<?php

use Illuminate\Support\Facades\Route;


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
Route::pattern('id','[0-9a-zA-Z]+');


Route::get('/', function () {
    return view('auth/login');
});




// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
//------------------------------------------------------------------------------------------------------------------
Route::resource('invoices' , 'App\Http\Controllers\InvoicesController');

Route::resource('sections' , 'App\Http\Controllers\SectionsController');

Route::resource('products' , 'App\Http\Controllers\ProductsController');

//----------------------------------------------------------------------------------------------------------------------
Route::get('/InvoicesDetails/{id}', 'App\Http\Controllers\InvoicesDetailsController@edit');
//----------------------------------------------------------------------------------------------------------------------
route::get('/View_file/{invoice_number}/{file_name}' , 'App\Http\Controllers\InvoicesDetailsController@open_file');

route::get('/download/{invoice_number}/{file_name}' , 'App\Http\Controllers\InvoicesDetailsController@file_download');

route::post('file_deleting' , 'App\Http\Controllers\InvoicesDetailsController@destroy')->name('file_deleting');

Route::resource('InvoiceAttachments', 'App\Http\Controllers\InvoicesAttachmentsController');
//---------------------------------------------------------------------------------------------------------------------
Route::get('/edit_invoice/{id}' , 'App\Http\Controllers\InvoicesController@edit');
//---------------------------------------------------------------------------------------------------------------------
Route::get('/status_show/{id}' , 'App\Http\Controllers\InvoicesController@show')->name('status_show');

Route::post('/status_update/{id}' , 'App\Http\Controllers\InvoicesController@status_update')->name('status_update');

Route::resource('archive', 'App\Http\Controllers\InvoiceArchiveController');
//----------------------------------------------------------------------------------------------------------------------
Route::get('paid_invoices' , 'App\Http\Controllers\InvoicesController@paid_invoices')->name('paid_invoices');

route::get('partial_invoices' , 'App\Http\Controllers\InvoicesController@partial_invoices');

route::get('unpaid_invoices' , 'App\Http\Controllers\InvoicesController@unpaid_invoices');
//----------------------------------------------------------------------------------------------------------------------
Route::get('/section/{id}', 'App\Http\Controllers\InvoicesController@getproducts');

route::get('/invoice_print/{id}','App\Http\Controllers\InvoicesController@invoice_print');

Route::get('invoices_reports' , 'App\Http\Controllers\invoices_reports@index');

Route::post('search_invoices' , 'App\Http\Controllers\invoices_reports@search_invoices');

route::get('clients_reports','App\Http\Controllers\clients_reports@index');

Route::post('search_clients' , 'App\Http\Controllers\clients_reports@search_clients');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});

Route::get('MarkAsRead_all','App\Http\Controllers\InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');


//--------------------------------------------------------------------------------------------------------------------
Route::get('/{page}', 'App\Http\Controllers\AdminController@index');

