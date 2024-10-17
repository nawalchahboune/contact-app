<?php

use App\Actions\Fortify\UpdateUserPassword;
use App\Http\Controllers\companyController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\ContactNoteController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\photoProfileController;
use App\Http\Controllers\Settings\PasswordChangeController;
use App\Http\Controllers\Settings\ProfileController;
use Illuminate\Support\Facades\Route;
Route::get('/dashboard', DashBoardController::class)->middleware('auth'); 
Route::get('/settings', ProfileController::class)->middleware('auth')->name('settings');

Route::post('/imageProfile', [photoProfileController::class,'upload'])->middleware('auth')->name('imageProfile');

Route::get('/changePassword', PasswordChangeController::class)->middleware('auth','verified')->name('modifyPassword'); 

Route::controller(ContactController::class)->group( function(){

Route::get('/', 'welcome' )->middleware('guest');

Route::get('/contacts','index' )->name( "contacts")->middleware('auth');
Route::post('/contacts','store' )->name( "store");
        
Route::get("/contacts/show/{id}", 'show')->name("show");
Route::get("/contacts/edit/{id}", 'edit')->name("edit");
Route::post("/contacts/update/{id}", 'update')->name("update");
Route::delete("contacts/destroy/{id}", 'destroy')->name("destroy");
Route::delete("contacts/forceDelete/{id}", 'forceDelete')->name("forceDelete");
Route::get("contacts/restore/{id}", 'restore')->name("restore");
Route::get('/contacts/create', 'create' )->name("createContact");
});