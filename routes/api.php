<?php

use App\Http\Controllers\API\HouseController;
use Illuminate\Support\Facades\Route;

Route::get('/houses/search', [HouseController::class, 'search']);
