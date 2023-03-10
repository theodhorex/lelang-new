<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BidController;

use App\Http\Livewire\Counter;

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

// Landing page
Route::get('/', function () {
    return view('landing-page/landing-page');
})->name('home');
Route::get('/landing-page/about-us', function () {
    return view('landing-page/about_us');
})->name('about-us');
Route::get('/landing-page/contact-us', function () {
    return view('landing-page/contact_us');
})->name('contact-us');





Route::get('/profile', [ProfileController::class, 'profilePages'])->name('profile');
Route::post('/profiles', [ProfileController::class, 'updateProfile'])->name('update-profile');


Route::middleware("role:admin|officer")->group(function(){
    Route::get('/form', [MainController::class, 'formPages'])->name('form');
    Route::post('/form-send', [MainController::class, 'formPagesSend'])->name('form-send');
    Route::post('/postingan-details-update/{id}', [MainController::class, 'postinganDetailsUpdate'])->name('postingan-details-update');
    Route::get('/delete-postingan/{id}', [MainController::class, 'deletePostingan'])->name('delete-postingan');
    Route::get('/account-pages', [MainController::class, 'accountListPages'])->name('account');
    Route::post('/add-account', [MainController::class, 'addAccount'])->name('add-account');
    Route::get('/account-detail/{id}', [MainController::class, 'getAccountDetailEdit'])->name('account-edit');
    Route::post('/account-update/{id}', [MainController::class, 'updateAccount'])->name('account-update');
    Route::get('/delete-account/{id}', [MainController::class, 'deleteAccount'])->name('delete-account');
    Route::post('/send-message/{id}', [MainController::class, 'sendMessage'])->name('send-message');
    Route::get('/stat', [MainController::class, 'statistic'])->name('stat');
    Route::get('/set-auction/{id}', [MainController::class, 'setAuctionStatus'])->name('set-auction');
    Route::get('/export-pdf-stat', [MainController::class, 'exportPdf'])->name('export-pdf');
});


Route::get('/list-item', [MainController::class, 'listItem'])->name('list-item');
Route::get('/history', [MainController::class, 'history'])->name('history');
Route::get('/postingan-details/{id}', [MainController::class, 'postinganDetails'])->name('postingan-details');
Route::get('/inbox', [MainController::class, 'inbox'])->name('inbox');
Route::get('/inbox-details/{id}', [MainController::class, 'getInboxDetails'])->name('get-inbox-details');
Route::post('/inbox-send/{id}/{inbox_id}', [MainController::class, 'inboxReply'])->name('inbox-send');
Route::get('/inbox-delete/{id}', [MainController::class, 'deleteInbox'])->name('inbox-delete');
Route::post('/inbox-multiple-delete', [MainController::class, 'inboxMultipleDelete'])->name('inbox-multiple-delete');
Route::get('/inbox-set-read/{id}', [MainController::class, 'readUnread'])->name('inbox-read-unread');
Route::get('/search', [MainController::class, 'search'])->name('search');
Route::post('/bid-send/{id}', [BidController::class, 'sendBid'])->name('send-bid');
Route::get('/get-bid-data-details/{id}', [BidController::class, 'getBidDataDetails'])->name('get-bid-data-details');




// Perintilan
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'perform'])->name('perform-logout');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [MainController::class, 'test']);
Route::get('/test/testtt', [Counter::class, 'render']);