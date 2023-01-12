<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('./auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user', function () {
    return view('user');
});

// Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Route::put('/edit/{id}', [StudentController::class, 'update'])->name('students.update');

// Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

// Route::get('/kelas', [ClassController::class, 'index'])-> name('class.index');

Route::resource('students', StudentController::class)->middleware('auth');

require __DIR__.'/auth.php';
