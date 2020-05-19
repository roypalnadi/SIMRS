<?php

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
    return view('welcome');
});

Route::get('/home', function () {
    return redirect('/login');
})->middleware('is_home');

Auth::routes();

Route::get('admin', 'HomeController@admin')->name('admin')->middleware('is_admin');
Route::get('/doctor', 'HomeController@dokter')->name('doctor')->middleware('is_doctor');

Route::resource('admin/user', 'UserController')->middleware('is_admin');

Route::resource('admin/doctor', 'DoctorController')->middleware('is_admin');

Route::resource('admin/poliklinik', 'PoliklinikController')->middleware('is_admin');

Route::resource('admin/pasien', 'PasienController')->middleware('is_admin');

Route::get('doctor/profil/{profil}', 'DoctorController@profil')->name('profil')->middleware('is_doctor');

Route::post('doctor/profil/edit/{id}', 'DoctorController@profilUpdate')->name('profilUpdate')->middleware('is_doctor');

Route::get('doctor/pasien/{doktor_id}', 'PasienController@viewPasienDoctor')->name('viewDoctor')->middleware('is_doctor');

Route::get('doctor/pasien/show/{doktor_id}', 'PasienController@detailPasienDoctor')->name('detailPasienDoctor')->middleware('is_doctor');
