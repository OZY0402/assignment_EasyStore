<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialAuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('custom_auth');

Route::get('/logout', function () {
   auth()->logout();
   return redirect()->route('social-auth');
})->name('logout')->middleware('custom_auth');

Route::get('/auth/social-auth',[SocialAuthController::class,'index'])->name('social-auth');

Route::get('/auth/google/redirect',[SocialAuthController::class,'googleRedirect'])->name('googleRedirect');

Route::get('/auth/google/callback',[SocialAuthController::class,'googleCallback'])->name('googleCallback');

Route::get('/auth/facebook/redirect',[SocialAuthController::class,'facebookRedirect'])->name('facebookRedirect');

Route::get('/auth/facebook/callback',[SocialAuthController::class,'facebookCallback'])->name('facebookCallback');
