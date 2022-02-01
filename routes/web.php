<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view',[AdminController::class,'addview']);

Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::post('/appoinment',[HomeController::class,'appoinment']);

Route::get('/myappoinment',[HomeController::class,'myappoinment']);
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);

Route::get('/view_appoinments',[AdminController::class,'viewAppoinments']);

Route::get('/aprove_appoint/{id}',[AdminController::class,'aproveAppoint']);

Route::get('/canceled/{id}',[AdminController::class,'cancelAppoint']);

Route::get('/show_doctor',[AdminController::class,'showDoctor']);

Route::get('/delete_doctor/{id}',[AdminController::class,'deleteDoctor']);

Route::get('/update_doctor/{id}',[AdminController::class,'updateDoctor']);
Route::post('/edit_doctor/{id}',[AdminController::class,'editDoctor']);

Route::get('/send_mail/{id}',[AdminController::class,'viewEmailSendCustomer']);

Route::post('/sendmail/{id}',[AdminController::class,'emailSendCustomer']);

/*
|---------------------------------------------------------------------------
|                       Route For Pages
|---------------------------------------------------------------------------
*/

Route::get('/about_page', function(){
    return view('user.about_us');
});
Route::get('/doctor_page', function(){
    return view('user.doctor_list');
});
Route::get('/news_page', function(){
    return view('user.news');
});
Route::get('/news-details', function(){
    return view('user.news-details');
});
Route::get('/contact_page', function(){
    return view('user.contact_us');
});