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
Route::get('/explosivetype', [App\Http\Controllers\ExplosivetypeController::class, 'index']);
Route::get('/firearm', [App\Http\Controllers\FirearmController::class, 'index']);
Route::get('/actor', [App\Http\Controllers\ActorController::class, 'index']);
Route::get('/businessactor', [App\Http\Controllers\BusinessactorController::class, 'index']);
Route::get('/eaosactor', [App\Http\Controllers\EaosactorController::class, 'index']);
Route::get('/govactor', [App\Http\Controllers\GovermentactorController::class, 'index']);
Route::get('/intelactor', [App\Http\Controllers\IntelactorController::class, 'index']);
Route::get('/milactor', [App\Http\Controllers\MilitaryactorController::class, 'index']);
Route::get('/actorgender', [App\Http\Controllers\ActorgenderController::class, 'index']);
Route::get('/actorage', [App\Http\Controllers\ActorageController::class, 'index']);
Route::get('/target', [App\Http\Controllers\TargetController::class, 'index']);
Route::get('/targetbusiness', [App\Http\Controllers\Targetbusiness::class, 'index']);
Route::get('/targeteaos', [App\Http\Controllers\TargeteaosController::class, 'index']);
Route::get('/targetgov', [App\Http\Controllers\TargetgovController::class, 'index']);
Route::get('/targetintel', [App\Http\Controllers\TargetintelController::class, 'index']);
Route::get('/targetmil', [App\Http\Controllers\TargetmilController::class, 'index']);
Route::get('/targettype', [App\Http\Controllers\TargettypeController::class, 'index']);
Route::get('/subtargettype', [App\Http\Controllers\SubtargettypeController::class, 'index']);
Route::get('/targetgender', [App\Http\Controllers\TargetgenderController::class, 'index']);
Route::get('/targetage', [App\Http\Controllers\TargetageController::class, 'index']);
Route::get('/tanggal', [App\Http\Controllers\TanggalController::class, 'index']);
Route::get('/violence', [App\Http\Controllers\ViolenceController::class, 'index']);
Route::get('/incidentdetail', [App\Http\Controllers\IncidentdetailController::class, 'index']);
Route::get('/articlelink', [App\Http\Controllers\ArticlelinkController::class, 'index']);
Route::get('/time', [App\Http\Controllers\TimeController::class, 'index']);
Route::get('/numberprotest', [App\Http\Controllers\NumberprotestController::class, 'index']);
Route::get('/issue', [App\Http\Controllers\IssueController::class, 'index']);
