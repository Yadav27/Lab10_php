


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Route for the Home page
Route::get('/home', [PageController::class, 'home'])->name('home');

// Route for the About page
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/', function () {
    return view('welcome');
});
