<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('login');
});
Route::get('/client', function () {
    return view('admin_pages.client_register');
})->name('client');
Route::post('/client', [App\Http\Controllers\MainController::class, 'clientData'])->name('client.data');
Route::get('/client-edit-{id}',[MainController::class, 'clientEdit'])->name('client.edit');
Route::post('/client-edit-data',[MainController::class, 'clientEditData'])->name('client.data.edit');
Route::get('/invoice',[MainController::class, 'invoice'])->name('invoices');
Route::get('/invoice-create',[MainController::class, 'invoiceCreate'])->name('invoice.create');
Route::post('/invoice-create-data',[MainController::class, 'invoiceCreateData'])->name('invoice.create.data');
Route::get('/invoice-view-{id}',[MainController::class, 'invoiceView'])->name('invoice.view');
Route::get('/view-invoice-{id}',[MainController::class, 'viewInvoice'])->name('view.invoice');

