<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::post('/subscribe/{topic}', [SubscriptionController::class, 'store']);
