<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',                function () { return view('dashboard'); })->name('dashboard');

    Route::get('/playground',               function () { return view('playground');            })->name('playground');

    Route::get('/playground/collection',    function () { return view('playground-collection'); })->name('playground/collection');
    Route::get('/playground/query',         function () { return view('playground-query');      })->name('playground/query');
    Route::get('/playground/qeloquent',     function () { return view('playground-eloquent');   })->name('playground/eloquent');

    Route::get('/films',                    function () { return view('films');                 })->name('films');

});
