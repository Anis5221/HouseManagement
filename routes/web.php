<?php

use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('flute-create', [FlatController::class, 'create'])->name('flute-create');
    Route::get('/dashboard', [FlatController::class, 'index'])->name('dashboard');
    Route::get('/show/{id}', [FlatController::class, 'show'])->name('flute.show');
    Route::get('/document/{id}', [DocumentRequestController::class, 'index'])->name('document.index');
    Route::post('/document/store', [DocumentRequestController::class, 'store'])->name('document.store');
    Route::get('/invoice/{id}', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::post('/invoice/update', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::delete('/invoice/delete/{id}', [InvoiceController::class, 'delete'])->name('invoice.delete');

});
