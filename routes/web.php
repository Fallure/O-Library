<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\DataEbookController;
use App\Http\Controllers\DataPublisherController;
use App\Http\Controllers\DataCategoryController;
use App\Http\Controllers\DataPustakawanController;
use App\Http\Controllers\DataMemberController;
use App\Http\Controllers\DataTransaksiController;
use App\Http\Controllers\DataReportController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LandingPageController::class, 'index']);
Route::post('/logged_in', [LoginController::class, 'authenticate']);
Route::get('/logout', [DataPustakawanController::class, 'logout']);
Route::get('/selecting-user', [StaticPageController::class, 'selecting']);

Route::middleware(['auth:sanctum', 'verified', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/book', [DataBukuController::class, 'index']);
    Route::post('/book', [DataBukuController::class, 'store']);
    Route::post('/book/search', [DataBukuController::class, 'search']);
    Route::get('/book/history', [DataBukuController::class, 'bookHistory']);
    Route::get('/return-book', [DataBukuController::class, 'returnBook']);
    Route::delete('/book/{book}', [DataBukuController::class, 'destroy']);
    Route::put('/book/{book}', [DataBukuController::class, 'update']);

    Route::get('/ebook', [DataEbookController::class, 'index']);
    Route::post('/ebook', [DataEbookController::class, 'store']);
    Route::post('/ebook/search', [DataEbookController::class, 'search']);
    Route::delete('/ebook/{ebook}', [DataEbookController::class, 'destroy']);
    Route::put('/ebook/{ebook}', [DataEbookController::class, 'update']);

    Route::get('/publisher', [DataPublisherController::class, 'index']);
    Route::post('/publisher', [DataPublisherController::class, 'store']);
    Route::post('/publisher/search', [DataPublisherController::class, 'search']);
    Route::delete('/publisher/{publisher}', [DataPublisherController::class, 'destroy']);
    Route::put('/publisher/{publisher}', [DataPublisherController::class, 'update']);

    Route::get('/category', [DataCategoryController::class, 'index']);
    Route::post('/category', [DataCategoryController::class, 'store']);
    Route::post('/category/search', [DataCategoryController::class, 'search']);
    Route::delete('/category/{categories}', [DataCategoryController::class, 'destroy']);
    Route::put('/category/{categories}', [DataCategoryController::class, 'update']);

    Route::get('/librarian', [DataPustakawanController::class, 'index']);
    Route::post('/librarian', [DataPustakawanController::class, 'store']);
    Route::post('/librarian/search', [DataPustakawanController::class, 'search']);
    Route::delete('/librarian/{user}', [DataPustakawanController::class, 'destroy']);
    Route::put('/librarian/{user}', [DataPustakawanController::class, 'update']);

    Route::get('/edit-profile', [DataPustakawanController::class, 'edit']);
    Route::post('/edit-profile', [DataPustakawanController::class, 'update']);

    Route::get('/change-password', [DataPustakawanController::class, 'editPass']);
    Route::post('/change-password', [DataPustakawanController::class, 'updatePass']);

    Route::get('/member', [DataMemberController::class, 'index']);
    Route::post('/member', [DataMemberController::class, 'store']);
    Route::post('/member/search', [DataMemberController::class, 'search']);
    Route::delete('/member/{member}', [DataMemberController::class, 'destroy']);
    Route::get('/member/history', [DataMemberController::class, 'memberHistory']);

    Route::get('/transaction', [DataTransaksiController::class, 'index']);

    Route::get('/report', [DataReportController::class, 'index']);
    Route::get('/report/late', [DataReportController::class, 'indexLate']);

    Route::get('/guide', [StaticPageController::class, 'guide']);
});

