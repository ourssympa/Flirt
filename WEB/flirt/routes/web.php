<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('scrapper',[\App\Http\Controllers\ScrapperController::class,"QuestionScrapper"]);
Route::get('scrapper2',[\App\Http\Controllers\ScrapperController::class,"QuestionScrapper2"]);
Route::get('hotscrapper',[\App\Http\Controllers\ScrapperController::class,"hotscrapper"]);
Route::get('hotscrapper2',[\App\Http\Controllers\ScrapperController::class,"hotscrapper2"]);
Route::get('quidenousscrapper',[\App\Http\Controllers\ScrapperController::class,"qui_de_nous"]);
Route::get('jenaijamaisscrapper',[\App\Http\Controllers\ScrapperController::class,"je_nai_jamaisscrapper"]);
Route::get('dismoiscrapper',[\App\Http\Controllers\ScrapperController::class,"dis_moiscrapper"]);
Route::get('user',[\App\Http\Controllers\UserController::class,"store"]);
