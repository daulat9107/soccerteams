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

Route::middleware('auth:api')->get('/has-roles', function (Request $request) {
    $user=$request->user();

    if($user->hasRole('admin','super admin')){
        return ['true'];
    }
     return ['false'];
});
Route::middleware('auth:api')->get('/has-permissions', function (Request $request) {
    $user=$request->user();

    return[$user->can('add team')];

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register','RegisterController@register');
Route::get('teams/search', 'TeamController@search');
Route::resource('teams', 'TeamController')->only([
    'index','show'
]);

Route::middleware('auth:api')->resource('teams', 'TeamController')->only([
     'store', 'update', 'destroy'
]);
Route::get('players/search', 'PlayerController@search');
Route::resource('players', 'PlayerController')->only([
    'index', 'show'
]);
Route::middleware('auth:api')->resource('players', 'PlayerController')->only([
     'store', 'update', 'destroy'
]);
