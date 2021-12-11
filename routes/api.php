<?php

use Illuminate\Http\Request;

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
Route::apiResources(['user' => 'API\UserController']);

//expenses routs
Route::apiResources(['expenses' => 'API\ExpensesController']);
Route::get('report_expense/{dateone}/{datetwo}', 'API\ExpensesController@report_date');
Route::get('report_expensed/{amountone}/{amountwo}', 'API\ExpensesController@report_money');
Route::get('report_ex', 'API\ExpensesController@report_ex');
Route::get('findexpenses', 'API\ExpensesController@search');

//orders routs
Route::apiResources(['orders' => 'API\OrdesController']);
Route::get('report_orders/{dateone}/{datetwo}', 'API\OrdesController@report_date');
Route::get('report_orderes/{amountone}/{amountwo}', 'API\OrdesController@report_money');
Route::get('report_orders/{prodect_id}', 'API\OrdesController@report_prodect');
Route::get('report_ord', 'API\OrdesController@report_ord');
Route::get('findorder', 'API\OrdesController@search');



Route::apiResources(['prodects' => 'API\ProdectController']);
Route::get('prodects/{dateone}/{datetwo}', 'API\ProdectController@report_date');
Route::get('findprodects', 'API\ProdectController@search');
Route::get('report_pro', 'API\ProdectController@report_pro');







