<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\KonsultasiController;
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
    return view('welcome');
});

Auth::routes();


Route::prefix('auth')->group(function () {
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
    Route::get('/users', [HomeController::class, 'index'])->name('home');
});

//setting
Route::prefix('setting')->group(function () {
    Route::get('/setting', [UserController::class,'index'])->name('setting');
    Route::put('/setting-action', [UserController::class,'updateProfile'])->name('profile.action');
});


// quest
Route::prefix('quest')->group(function () {
    Route::get('/quest', [QuestController::class,'create'])->name('quest');
    Route::post('/quest-store',[QuestController::class,'store'])->name('quest.store');
    Route::get('/show-quest', [QuestController::class,'show'])->name('show.quest');
    Route::get('/quest/edit/{id}',[QuestController::class,'edit'])->name('quest.edit');
    Route::put('/quest/edit/{id}',[QuestController::class,'update'])->name('quest.update');
    Route::get('/quest/delete/{id}',[QuestController::class,'destroy'])->name('quest.delete');
});

// disease
Route::prefix('disease')->group(function () {
    Route::get('/disease', [DiseaseController::class,'create'])->name('disease');
    Route::post('/disease/store',[DiseaseController::class,'store'])->name('disease.store');
    Route::get('/show-disease', [DiseaseController::class,'show'])->name('show.disease');
    Route::get('/disease/edit/{id}',[DiseaseController::class,'edit'])->name('disease.edit');
    Route::put('/disease/edit/{id}',[DiseaseController::class,'update'])->name('disease.update');
    Route::get('/disease/delete/{id}',[DiseaseController::class,'destroy'])->name('disease.delete');
});

// knowledge
Route::prefix('knowledge')->group(function () {
    Route::get('/knowledge', [KnowledgeController::class,'create'])->name('knowledge');
    Route::post('/knowledge/store',[KnowledgeController::class,'store'])->name('knowledge.store');
    Route::get('/show-knowledge', [KnowledgeController::class,'show'])->name('show.knowledge');
    Route::get('/knowledge/edit/{id}',[KnowledgeController::class,'edit'])->name('knowledge.edit');
    Route::put('/knowledge/edit/{id}',[KnowledgeController::class,'update'])->name('knowledge.update');
    Route::get('/knowledge/delete/{id}',[KnowledgeController::class,'destroy'])->name('knowledge.delete');
});


// konsultasi
Route::prefix('konsultasi')->group(function () {
    Route::get('/konsultasi', [KonsultasiController::class,'index'])->name('konsultasi');
    Route::post('/kusioner', [KonsultasiController::class,'kusioner'])->name('kusioner');
});


