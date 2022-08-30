<?php

use App\Http\Livewire\AttentionPoints;
use App\Http\Livewire\Nurses;
use App\Http\Livewire\Specialities;
use App\Http\Livewire\Videos;
use App\Http\Livewire\Users;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
// Route::get('navbar', NavBarController::class)->name('navbar');
Auth::routes();

Route::middleware(['auth'])->group(function(){
// Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', Videos::class)->name('media');
Route::get('users', Users::class)->name('users');
Route::get('especialidad', Specialities::class)->name('especialidad');
Route::get('enfermeria', Nurses::class)->name('enfermeria');
Route::get('patencion', AttentionPoints::class)->name('patencion');
});

Route::prefix('api-v2')->group(function () {
    Route::middleware(['auth'])->get('/getNavbar',function(Request $req){
    $ids = Auth::user()->id;
    $user_sessions = User::join('specialties as s','s.id','users.specialty_id')
    ->select('nombre')->where('users.id',$ids)->get();
    $data = [];
        foreach($user_sessions as $us){
            array_push($data,[
            "name" => $us->nombre,
            ]);
        }
    return $data;
    });
});
