<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestCandidateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TestCandidateController::class, 'index']);
Route::resource('/test-candidate', TestCandidateController::class);
Route::post('/test-candidate/import', [TestCandidateController::class, 'import'])->name('test-candidate.import');
