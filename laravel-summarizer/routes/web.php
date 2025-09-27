<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SummarizeController;

Route::get('/', [SummarizeController::class, 'showForm']);
Route::post('/summarize', [SummarizeController::class, 'summarize'])->name('summarize');
