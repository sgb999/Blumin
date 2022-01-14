<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  Index,
  ClientController,
  ContactController,
  UserController
};
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

Route::get('/', [Index::class, 'home'])->name('adminHome');
Route::match(['get', 'post'],  '/create-client', [ClientController::class, 'createClient'])->name('create-client');
Route::match(['get', 'post'], '/create-contact', [ContactController::class, 'createContact'])->name('create-contact');
Route::get('/view-all-clients', [ClientController::class, 'viewClientPage'])->name('view-clients');
Route::get('/view-clients/{date}', [ClientController::class, 'viewClients']);
Route::get('/view-all-contacts', [ContactController::class, 'viewContactPage'])->name('view-contacts');
Route::get('/view-contacts/{DATE}', [ContactController::class, 'viewContacts']);
Route::match(['get', 'put'], '/manage-contact/{id}', [ContactController::class, 'manageContact']);
Route::match(['get', 'put'], '/manage-client/{id}', [ClientController::class, 'manageClient']);
Route::get('/view-contact/{id}', [ContactController::class, 'viewContact']);
Route::get('/view-client/{id}', [ClientController::class, 'viewClient']);
Route::match(['get', 'post'],'/search-users', [UserController::class, 'searchRecords'])->name('search');
