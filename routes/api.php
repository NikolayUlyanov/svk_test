<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('/shows', [ShowController::class, 'index'])->name('shows.index');

Route::get('/shows/{showId}/events', [EventController::class, 'index'])->name('shows.events.index');

Route::get('/events/{eventId}/places', [PlaceController::class, 'index'])->name('events.places.index');

Route::post('/events/{eventId}/reserve', [PlaceController::class, 'reserve'])->name('events.places.reserve');
