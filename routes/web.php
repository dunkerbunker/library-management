<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\LateReturnController;
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



Route::post('/auth/save',[RegisterController::class, 'save'])->name('auth.save');
Route::get('/auth/check', [LoginController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::get('/auth/register', [RegisterController::class, 'register'])->name('auth.register');


Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/auth/login', [LoginController::class, 'login'])->name('auth.login');

    Route::get('/', [DashboardController::class, 'Dashboard']);

    // Route::get('/admin/book-details', [DashboardController::class, 'BookDetails'])->name('admin.book-details');
    Route::resource('/admin/book-details', BookController::class);

    // Route::get('/admin/borrowers', [DashboardController::class, 'Borrowers'])->name('admin.borrowers');
    Route::resource('/admin/borrowers', BorrowerController::class);

    // Route::get('/admin/users', [DashboardController::class, 'Users'])->name('admin.users');
    Route::resource('/admin/users', UsersController::class);
    
    // Route::get('/admin/book-issue', [DashboardController::class, 'BookIssue'])->name('admin.book-issue');
    Route::get('/admin/book-issue', [BookIssueController::class, 'index'])->name('admin.book-issue');
    Route::post('/admin/book-issue', [BookIssueController::class, 'store'])->name('admin.book-issue.store');

    // Route::get('/admin/book-return', [DashboardController::class, 'BookReturn'])->name('admin.book-return');
    Route::get('/admin/book-return', [BookReturnController::class, 'index'])->name('admin.book-return');
    Route::post('/admin/book-return', [BookReturnController::class, 'store'])->name('admin.book-return.store');

    // Route::get('/admin/late-return', [DashboardController::class, 'LateReturn'])->name('admin.late-return');
    Route::get('/admin/late-return', [LateReturnController::class, 'index'])->name('admin.late-return');
    Route::get('/admin/generate-invoice/{id}', [LateReturnController::class, 'invoice'])->name('admin.late-return.invoice');

    Route::get('/admin/login-information', [DashboardController::class, 'LoginInformation'])->name('admin.login-information');
});

