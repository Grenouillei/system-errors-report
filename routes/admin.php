<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', 'App\Http\Controllers\Admin\IndexController@index')->name('admin-index');

Route::resource('projects',App\Http\Controllers\Admin\ProjectController::class);
Route::resource('users',App\Http\Controllers\Admin\UserController::class);
Route::resource('roles',App\Http\Controllers\Admin\RoleController::class);
Route::resource('reports',App\Http\Controllers\Admin\ReportController::class);

Route::get('reports-content', 'App\Http\Controllers\Admin\ReportController@getContent')->name('reports.content');
Route::get('reports-exactly', 'App\Http\Controllers\Admin\ReportController@getExactlyContent')->name('reports.exactly');
