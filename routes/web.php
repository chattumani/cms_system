<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/', function () {
    return redirect()->route('pages.index');
});

Route::resource('pages', PageController::class);


Route::get('/{slug1}/{slug2?}/{slug3?}/{slug4?}', [PageController::class, 'show'])
    ->where(['slug1' => '.*', 'slug2' => '.*', 'slug3' => '.*', 'slug4' => '.*'])
    ->name('page.show');
