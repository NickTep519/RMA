<?php

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\SpecificityController;
use App\Http\Controllers\DiscoveryPropertiesContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::resource('properties', PropertyController::class)->except(['show']) ;
    Route::resource('specificities', SpecificityController::class)->except(['show']) ; 
}) ; 

Route::prefix('biens')->name('property.')->group(function(){
    Route::get('/', [DiscoveryPropertiesContoller::class, 'index'])->name('index') ; 
    Route::get('/{slug}-{property}', [DiscoveryPropertiesContoller::class, 'show'])->name('show')->where(
        [
            'slug' => '[0-9a-z\-]+',
            'property' => '[0-9]+'
        ]
    ) ; 
}) ; 


require __DIR__.'/auth.php';