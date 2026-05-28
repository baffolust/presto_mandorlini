<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;


/* PUBLIC CONTROLLER */
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/article/search', [PublicController::class, 'searchArticles'])->name('article.search');
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

/* ARTICLE CONTOLLER */
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');

/* REVISOR CONTROLLER */
Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index')->middleware('isRevisor');
Route::get('/revisor/become-revisor', [RevisorController::class, 'becomeRevisor'])->name('revisor.become-revisor')->middleware('auth');
Route::get('/revisor/make-revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('revisor.make-revisor');

Route::patch('/revisor/accept/{article}', [RevisorController::class, 'acceptArticle'])->name('revisor.article.accept')->middleware('isRevisor');
Route::patch('/revisor/reject/{article}', [RevisorController::class, 'rejectArticle'])->name('revisor.article.reject')->middleware('isRevisor');
