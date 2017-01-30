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

Route::resource(
    'videos', 'VideoController',
    [ 'except' => ['create', 'edit'] ]
);

Route::resource(
    'channels', 'ChannelController',
    [ 'except' => ['create', 'edit'] ]
);

Route::resource(
    'comments', 'CommentController',
    [ 'except' => ['create', 'edit'] ]
);

// Get current user
Route::get('/me', function (Request $request) {
    return $request->user();
})->middleware('auth:api');