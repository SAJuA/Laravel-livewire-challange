<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/tasks', 'tasks');
Route::get('/', function () {
    return view('welcome');
});
