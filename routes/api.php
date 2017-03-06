<?php

use Illuminate\Http\Request;
use App\Gender;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//   return $request->user();
// });

Route::group(['prefix' => 'v1'], function() {

  Route::resource('genders', 'GendersController');
  Route::resource('artists', 'ArtistsController');
});

// Route::group(['prefix'=>'v1'], function(){
//
//   Route::get('/genders', function(){
//
//     $genders = Gender::all();
//     // select * from genders;
//     return $genders;
//   });
//
//   Route::get('/genders/{id}', function($id){
//
//     $gender = Gender::find($id);
//     // select * from genders where id=$id
//     return $gender;
//   });
// });
//
//
// Route::get('/hello', function(){
//
//   return "Hello World desde ruta sin prefijo";
// });
//
// Route::get('/hello/{name}', function($name){
//
//   return "Hello ".$name;
// });
