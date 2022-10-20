<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\BaladeController;
use App\Http\Controllers\ParticipantController;


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
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});


Route::get('/evenement/all', [EvenementController::class, 'AllEvenement'])->name('all.evenement');

Route::post('/evenement/add', [EvenementController::class, 'AddEvenement'])->name('store.evenement');
Route::get('/evenement/create', function () {
    return view('Evenement.BackOffice.AddEvenement');
});
Route::delete('/evenement/delete/{id}',[EvenementController::class,'destroy']);

Route::get('/evenement/edit/{id}',[EvenementController::class,'edit']);
Route::put('/evenement/update/{id}',[EvenementController::class,'update']);




Route::get('/balade/all', [BaladeController::class, 'AllBalade'])->name('all.balade');

Route::post('/balade/add', [BaladeController::class, 'AddBalade'])->name('store.balade');
Route::get('/balade/create', function () {
    return view('Balade.BackOffice.AddBalade');
});
Route::delete('/balade/delete/{id}',[BaladeController::class,'destroy']);

Route::get('/balade/edit/{id}',[BaladeController::class,'edit']);
Route::put('/balade/update/{id}',[BaladeController::class,'update']);



Route::get('/participant/all', [ParticipantController::class, 'AllParticipant'])->name('all.participant');

Route::post('/participant/add', [ParticipantController::class, 'AddParticipant'])->name('store.participant');
Route::get('/participant/create', [ParticipantController::class, 'createParticipant']);



Route::delete('/participant/delete/{id}',[ParticipantController::class,'destroy']);

Route::get('/participant/edit/{id}',[ParticipantController::class,'edit']);
Route::put('/participant/update/{id}',[ParticipantController::class,'update']);

