<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GigController;

Route::get('/', function () {
    $quotes = \App\Models\Quote::inRandomOrder()->limit(2)->get();
    return view('welcome', compact('quotes'));
});

Route::resource('gigs', GigController::class);
