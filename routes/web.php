<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Show;
use App\Http\Controllers\Home;

Route::get('/', [Show::class , 'Register']);
Route::get('/login', [Show::class , 'Login'])->name('login');
Route::get('/edit', [Show::class , 'Edit']);
Route::get('/forgot', [Show::class , 'Forgot']);
Route::get('/checkOtp', [Show::class , 'checkOtp']);
Route::get('/dashboard', [Show::class , 'Dashboard'])->middleware('checkSession');
Route::post('/', [Home::class , 'Register'])->name('Register');
Route::post('/login', [Home::class , 'Login'])->name('Login');
Route::post('/forgotPassword', [Home::class , 'forgotPassword'])->name('forgotPassword');
Route::post('/checkOtp', [Home::class , 'checkOtp'])->name('checkOtp');
Route::put('/edit', [Home::class , 'edit'])->name('edit');
Route::get('/logout', [Home::class , 'Logout'])->name('logout');