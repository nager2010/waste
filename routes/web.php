<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicWasteReportController;

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

// المسارات العامة
Route::get('/', [PublicWasteReportController::class, 'create'])->name('waste-reports.create');
Route::post('/', [PublicWasteReportController::class, 'store'])->name('waste-reports.store');
Route::get('/thank-you', [PublicWasteReportController::class, 'thankYou'])->name('waste-reports.thank-you');
