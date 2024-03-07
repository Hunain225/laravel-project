<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/urlgetdata/{text?}/{number?}',function($text = null,$number = null){
    $data = compact('text','number');
    return view('urldata')->with($data);
});
Route::get('/invoice',function(){
    return view('invoice');
}); 

Route::post('/createInvoice', function (Request $request) {
    $billingInfo = $request->except('_token'); 
    Session::put('billing_info', $billingInfo);
    return redirect('/invoice');
});