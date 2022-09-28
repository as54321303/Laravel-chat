<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ChatController;
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

Route::get('/',function(){
    return view("chat");
  });
//   Route::get('/send-notification',function(Request $request){
//       event(new \App\Events\SendNotification($request->username,$request->message));
//       return "Sent Successfully";
//   });

Route::get('/send-notification',[ChatController::class,'chat']);
