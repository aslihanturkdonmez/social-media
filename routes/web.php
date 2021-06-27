<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\FriendController;
use App\Http\Controllers\User\MemberController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Livewire\Friendship;
use App\Models\Friend;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum','verified'])->prefix('user')->group(function(){
    Route::get('profile/{user:username}', [ProfileController::class,'index'])->name('profiles.show');
    Route::get('friends',[FriendController::class,'index'])->name('friends');

    //Friends sayfası için route
    //Route::get('friends/add/{user:username}', [Friendship::class,'add'])->name('add');

});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
