<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::resource('task_statuses', TaskStatusController::class)->except('show')->parameters(['task_statuses' => 'status']);
Route::resource('tasks', TaskController::class);
Route::resource('labels', LabelController::class)->except('show');
