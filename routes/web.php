<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\ProfController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\websiteController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group([
    'middleware' => ['is_admin','auth'],
    'prefix' => 'admin'
],function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
        
    Route::resource('/domains',DomainController::class);
    Route::resource('/profs',ProfController::class);
    Route::resource('/courses',CourseController::class);
        
});

Route::get('/',[websiteController::class,'index']);
Route::get('/domains',[websiteController::class,'getDomains'])->name('get_domains');

Route::get('/domain/{slug}',[websiteController::class,'getDomainBySlug'])->name('get_domain_slug');
 





 


