<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/tour/{slug}', [IndexController::class, 'tour'])->name('tour');
Route::get('/chi-tiet-tour/{slug}', [IndexController::class, 'detail_tour'])->name('chi-tiet-tour');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//categories
Route::resource('categories', CategoriesController::class);

//tours
Route::resource('tours', ToursController::class);
//gallery
Route::resource('gallery', GalleryController::class);
//schedule
Route::resource('schedule', ScheduleController::class);
//booking
Route::resource('booking', BookingController::class);
