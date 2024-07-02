<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\Managers\PropertyController;
use App\Http\Controllers\Managers\ManagersController;
use App\Http\Controllers\Properties\DiscoveryPropertiesContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingCotroller;
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


Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->name('profile.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('edit') ;
    Route::patch('/profile', [ProfileController::class, 'update'])->name('update') ;
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('destroy') ;
}) ;  

Route::prefix('managers')->name('managers.')->group(function(){
    Route::get('/', [ManagersController::class, 'index'])->name('index') ; 
    Route::get('/{user}', [ManagersController::class, 'show'])->name('show') ;
    Route::resource('property', PropertyController::class)->except(['show', 'index'])->middleware('auth') ;
    Route::resource('contract', ContractController::class)->except('index')->middleware('auth') ; 
}) ;

Route::prefix('images')->name('image.')->group(function (){
    Route::get('/{path}', [ImageController::class, 'show'])->where('path', '.*') ; 
    Route::delete('/{image}', [ImageController::class, 'destroy'])->name('destroy') ; 

}) ; 

Route::get('/', [HomeController::class, 'home'])->name('home.index') ;

Route::prefix('properties')->name('properties.')->group(function() {
    Route::get('/', [DiscoveryPropertiesContoller::class, 'index'])->name('index') ; 
    Route::get('/{slug}-{property}', [DiscoveryPropertiesContoller::class, 'show'])->name('show')->where([
        
            'slug' => '[0-9a-z\-]+',
            'property' => '[0-9]+'
        ]  
    ) ; 
}) ;  

Route::post('/users/{user}/rate', [RatingCotroller::class, 'rateUser'])->name('rating') ; 


/*Route::get('/test-env', function() {
    return [
        'WHATSAPP_API_URL' => env('WHATSAPP_API_URL'),
        'WHATSAPP_ACCESS_TOKEN' => env('WHATSAPP_ACCESS_TOKEN')
    ];
});*/



require __DIR__.'/auth.php' ;