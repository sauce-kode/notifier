<?php

use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::post('/subscribe/{topic}', [SubscriptionController::class, 'create']);
Route::post('/publish/{topic}', [PublisherController::class, 'create']);

Route::post('/test1', [SubscriberController::class, 'get']);
Route::post('/test2', [SubscriberController::class, 'get2']);

