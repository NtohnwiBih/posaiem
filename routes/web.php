<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannersController;

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
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('services', [FrontendController::class, 'services'])->name('services');
Route::get('blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');


Route::prefix('/admin')->group(function() {
    Route::match(['get', 'post'], 'login', [AdminController::class, 'login']); // match() method is used to use more than one HTTP request method for the same route, so GET for rendering the login.php page, and POST for the login.php page <form> submission (e.g. GET and POST)    // Matches the '/admin/dashboard' URL (i.e. http://127.0.0.1:8000/admin/dashboard)

        Route::group(['middleware' => ['admin']], function() {
            Route::get('dashboard', [AdminController::class, 'dashboard']);
            Route::get('logout', [AdminController::class, 'logout']); 
            Route::match(['get', 'post'], 'update-admin-password', [AdminController::class, 'updateAdminPassword']); // GET request to view the update password <form>, and a POST request to submit the update password <form>
            Route::post('check-admin-password', [AdminController::class, 'checkAdminPassword']); // Check Admin Password // This route is called from the AJAX call in admin/js/custom.js page
            Route::match(['get', 'post'], 'update-admin-details', [AdminController::class, 'updateAdminDetails']); // Update Admin Details in update_admin_details.blade.php page    // 'GET' method to show the update_admin_details.blade.php page, and 'POST' method for the <form> submission in the same page

            // Banners
            Route::get('banners', [BannersController::class, 'banners']);
            Route::post('update-banner-status', [BannersController::class, 'updateBannerStatus']); // Update Categories Status using AJAX in banners.blade.php
            Route::get('delete-banner/{id}', [BannersController::class, 'deleteBanner']); // Delete a banner in banners.blade.php
            Route::match(['get', 'post'], 'add-edit-banner/{id?}', [BannersController::class, 'addEditBanner']); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Banner', and if not passed, this means' Add a Banner'    // GET request to render the add_edit_banner.blade.php view, and POST request to submit the <form> in that view

        });
});