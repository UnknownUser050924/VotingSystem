<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;

Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');

Route::get('/vote', function () {
    return view('vote_page');
});

Route::get('/results', [VoteController::class, 'showResults'])->name('vote.results');

Route::get('/ratings', [VoteController::class, 'showRatings'])->name('vote.ratings');
