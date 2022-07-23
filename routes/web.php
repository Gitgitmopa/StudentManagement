<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\UserController;
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
//BASIC ROUTING
Route::get('/greetings', function () {
     return 'Hello Participants';
 });
// //DEPENDECIES INJECTION
// Route::get('/students', function (Request $request) {
//     return $request->id;
// });
// //REDIRECT
// Route::redirect('/','/greetings');
// //PASS DATA                                     //If you want to add a link or name of router ->name('welcome')
// Route::view('/welcome','welcome',['name' => 'Jeffrey'])->name('welcome');

// //ROUTE MODEL BINDING
// Route::get('/students/{user}', function(User $user){
//     return $user;
// });

// //OPTIONAL PARAMETER
// Route::get('/student/{name?}',function($name = null){
//     return $name;
// });

//GROUP PREFIX -- If we want to group hindi sabog or kalat ex:imventory/products
// Route::prefix('admin')->group(function() {
//     Route::get('/student',function(){
//         return 'student';
//     });
//     Route::get('/faculty',function(){
//         return 'facilities';
//     });
//     Route::get('/class',function(){
//         return 'class';
//     });
// });


//ACTIVITY
Route::get('/users',[App\Http\Controllers\UserController::class,'index'])->middleware('checkUser');

Route::get('students/subjects',[App\Http\Controllers\StudentController::class, 'subjects']);
Route::resource('students', App\Http\Controllers\StudentController::class)->middleware('auth'); 

Auth::routes();
Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::redirect('/', '/home');
