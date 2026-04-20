<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TaskPageController;

Route::get('/', function () {
    return view('welcome');
});

// Kanban board
Route::get('/tasks/kanban', [TaskPageController::class, 'kanban'])->name('tasks.kanban');

// АІ
Route::post('/tasks/{task}/generate-subtasks', [TaskPageController::class, 'generateSubtasks'])
    ->name('tasks.generateSubtasks');

Route::get('/tasks', [TaskPageController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskPageController::class, 'create'])->name('tasks.create');
Route::get('/tasks/{task}', [TaskPageController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskPageController::class, 'edit'])->name('tasks.edit');
Route::post('/tasks', [TaskPageController::class, 'store'])-> name('tasks.store');
Route::put('/tasks/{task}', [TaskPageController::class, 'update'])->name('tasks.update');
Route::patch('/tasks/{task}/status', [TaskPageController::class, 'updateStatus'])->name('tasks.updateStatus');
Route::delete('/tasks/{task}', [TaskPageController::class, 'destroy'])->name('tasks.destroy');
