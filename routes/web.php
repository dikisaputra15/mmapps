<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\StatistikController::class, 'index']);
Route::get('/incidenttype', [App\Http\Controllers\IncidenttypeController::class, 'index']);
Route::get('/subincidenttype', [App\Http\Controllers\SubincidenttypeController::class, 'index']);
Route::get('/socialconflict', [App\Http\Controllers\SocialconflictController::class, 'index']);
Route::get('/weapontype', [App\Http\Controllers\WeapontypeController::class, 'index']);
Route::get('/actor', [App\Http\Controllers\ActorController::class, 'index']);
Route::get('/actortype', [App\Http\Controllers\ActortypeController::class, 'index']);
Route::get('/target', [App\Http\Controllers\TargetController::class, 'index']);
Route::get('/targettype', [App\Http\Controllers\TargettypeController::class, 'index']);
Route::get('/tanggal', [App\Http\Controllers\TanggalController::class, 'index']);
Route::get('/subactortype', [App\Http\Controllers\SubactortypeController::class, 'index']);
Route::get('/explosivetype', [App\Http\Controllers\ExplosivetypeController::class, 'index']);
Route::get('/violence', [App\Http\Controllers\ViolenceController::class, 'index']);
Route::get('/articlelink', [App\Http\Controllers\ArticlelinkController::class, 'index']);
Route::get('/businessentity', [App\Http\Controllers\BusinessentityController::class, 'index']);
Route::get('/civiliantype', [App\Http\Controllers\CiviliantypeController::class, 'index']);
Route::get('/community', [App\Http\Controllers\ComunitygroupController::class, 'index']);
Route::get('/goverment', [App\Http\Controllers\GovermentController::class, 'index']);
Route::get('/military', [App\Http\Controllers\MilitarytypeController::class, 'index']);
Route::get('/police', [App\Http\Controllers\PolicetypeController::class, 'index']);
Route::get('/separatist', [App\Http\Controllers\SeparatistgroupController::class, 'index']);
Route::get('/terorist', [App\Http\Controllers\TeroristgroupController::class, 'index']);
Route::get('/vested', [App\Http\Controllers\VestedController::class, 'index']);
Route::get('/time', [App\Http\Controllers\TimeController::class, 'index']);
Route::get('/numberprotest', [App\Http\Controllers\NumberprotestController::class, 'index']);
Route::get('/issue', [App\Http\Controllers\IssueController::class, 'index']);
