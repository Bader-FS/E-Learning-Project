<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\ProfController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\websiteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\PayedController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\OrderController;



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
    Route::resource('/payments',PayedController::class);
    Route::resource('/users',UserController::class);

        
});

Route::get('/',[websiteController::class,'index']);
Route::get('/domains',[websiteController::class,'getDomains'])->name('get_domains');

Route::get('/courses',[websiteController::class,'getCourses'])->name('get_courses');

Route::get('/domain/{slug}',[websiteController::class,'getDomainBySlug'])->name('get_domain_slug');
 
Route::get('/domain/{domain_slug}/{course_slug} ',[websiteController::class,'getCourseBySlug'])->name('get_course_slug');

Route::group([
    'middleware' => ['auth']
], function () {

    Route::get('stripe/{course}',[PaymentController::class,'index'])->name('stripe.form');
    Route::post('order/pay',[PaymentController::class,'pay']);
    Route::get('pay/success',[PaymentController::class,'success']);

    Route::get('order',[OrderController::class,'index'])->name('order.index');


});



 


