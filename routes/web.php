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

Route::get('/', [\App\http\Controllers\LandingController::class,'index'])->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/user', [App\Http\Controllers\UserController::class,'index'
])->middleware(['checkrole:admin'])->name('user.index');
Route::get('/user/create', [App\Http\Controllers\UserController::class,'create'
])->middleware(['checkrole:admin'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\UserController::class,'store'
])->middleware(['checkrole:admin'])->name('user.store');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class,'edit'
])->middleware(['checkrole:admin'])->name('user.edit');
Route::put('/user/{id}', [App\Http\Controllers\UserController::class,'update'
])->middleware(['checkrole:admin'])->name('user.update');
Route::get('/user/show/{id}', [App\Http\Controllers\UserController::class,'show'
])->middleware(['checkrole:admin'])->name('user.show');
Route::delete('/user{id}', [App\Http\Controllers\UserController::class,'destroy'
])->middleware(['checkrole:admin'])->name('user.delete');

require __DIR__.'/auth.php';
