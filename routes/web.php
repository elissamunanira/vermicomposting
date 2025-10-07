<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BinController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\pageController;
use Illuminate\Http\Request;
use App\Http\Controllers\BinconditionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlantingComponstcontroller;
use App\Http\Controllers\HarvestingCompostController;
use App\Http\Controllers\LocationController;
use App\Http\Livewire\LocationDropdown;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\MicrocontrollerController;
use App\Http\Controllers\WormController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ActivityLogController;




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

// Route::get('/send',[UserController::class,'sendnotification']
//  );


//public routes



Route::get('/dependent_dropdown', function () {
    return view('livewire.dependent_dropdown');
});





Route::get('/location',[LocationController::class, 'create']);
Route::post('/location/store',[LocationController::class,'store']);
Route::get('/',[pageController::class, 'index']);
Route::get('/invalidateError',[pageController::class,'InvalidError']);
Route::get('/cooperative_invalidateError',[pageController::class,'InvalidCooperativeError']);







Route::post('/regis',[UserController::class,'register']);
Route::post('/log',[UserController::class,'login']);




//Route::get('/bins',[BinController::class,'index']);

Route::get('/login',function(){
    return view('Auth.login1');
})->name('login');

Route::get('/register',function(){
     return view('Auth.register1');
 });



//  Resseting password

// get_resseting password form

 Route::get('forget_password/', [UserController::class, 'forgetPassword'])->name('forget_password');


// Send password reset email
Route::post('forget_password_post/', [UserController::class, 'forgetPasswordPost'])->name('forget_password_post');
Route::get('password_reset/{token}', [UserController::class, 'resetPassword']);
Route::post('reset_password_post/', [UserController::class, 'resetPasswordPost'])->name('reset_password_post');


// // Show the password reset form
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// // Reset password
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



//  Route::get('/create_bin',function(){
//     return view('Normal.create_bin');
// });



Route::get('/Profile/show/{id}', [LocationController::class, 'show']);





//protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {
//dashboard



//microcontroller
Route::get('/microcontrollers/index', [MicrocontrollerController::class, 'index']);
Route::get('/microcontrollers/create', [MicrocontrollerController::class, 'create']);
Route::post('/microcontrollers/storecontroller', [MicrocontrollerController::class, 'store']);
Route::get('/microcontrollers/{microcontroller}/show', [MicrocontrollerController::class, 'show']);
Route::get('/microcontrollers/{microcontroller}/edit', [MicrocontrollerController::class, 'edit']);
Route::put('/microcontrollers/{microcontroller}/update', [MicrocontrollerController::class, 'update']);
Route::get('/microcontrollers/{microcontroller}/delete', [MicrocontrollerController::class, 'destroy']);



//worms
Route::get('/worms/index', [WormController::class, 'index']);
Route::get('/worms/create', [WormController::class, 'create']);
Route::post('/worms/store', [WormController::class, 'store']);
Route::get('/worms/{worm}/show', [WormController::class, 'show']);
Route::get('/worms/{worm}/edit', [WormController::class, 'edit']);
Route::put('/worms/{worm}/update', [WormController::class, 'update']);
Route::get('/worms/{worm}/delete', [WormController::class, 'destroy']);


//cooperative
Route::get('/cooperatives',[CooperativeController::class, 'index']);
Route::get('/cooperatives/create',[CooperativeController::class, 'create'])->middleware('role:Admin');

Route::get('/cooperatives/status_code/{cooperative}/{status_code}', [CooperativeController::class, 'updateStatus'])->name('cooperatives.update.status') ->middleware('role:Admin');


Route::post('/cooperatives/post',[CooperativeController::class, 'store'])->middleware('role:Admin');
Route::get('/cooperatives/{cooperative}/delete',[CooperativeController::class, 'destroy'])->middleware('role:Admin');


Route::get('/cooperatives/{cooperative}/edit',[CooperativeController::class, 'edit'])->middleware('role:Admin');
Route::put('/cooperatives/{coopertive}/update',[CooperativeController::class, 'update'])->middleware('role:Admin');

Route::get('/cooperatives/{cooperative}/show',[CooperativeController::class, 'show']);




//cooperative members



Route::get('/cooperatives/show',[MemberController::class, 'index']);
Route::get('/cooperatives_membe/create',[MemberController::class, 'create']);
Route::post('/cooperatives_membe/post',[MemberController::class, 'store']);
Route::get('/cooperatives_member/{member}/show',[MemberController::class, 'show']);
Route::get('/cooperatives_member_update/{member}/create',[MemberController::class, 'edit']);
Route::put('/cooperatives_member_update/{member}/update',[MemberController::class, 'update']);
Route::get('/cooperatives_member_update/{member}/delete',[MemberController::class,'destroy']);

//locations rwanda
Route::get('/getDistricts',[MemberController::class,'getDistricts']);
Route::get('/getSectors',[MemberController::class,'getSectors']);
Route::get('/getCells',[MemberController::class,'getCells']);











Route::get('/harvesting/index',[HarvestingCompostController::class, 'index']);
Route::get('/harvesting/{bin}/create',[HarvestingCompostController::class, 'create']);
Route::post('/harvesting/{bin}/post',[HarvestingCompostController::class, 'store']);

Route::get('/planting/{bin}',[PlantingComponstcontroller::class, 'create']);
Route::post('/planting/{bin}/store',[PlantingComponstcontroller::class, 'store']);


Route::get('/notification',[pageController::class, 'databaseNoIndex']);


// Route::post('/mark-as-read',[AdminController::class, 'markNotification'])->name('markNotification');

Route::get('/managers',[pageController::class, 'managers']);
Route::get('/dashboard',[pageController::class, 'dashbord']);

Route::get('/adminbins',[pageController::class, 'adminbin']);

Route::get('/admsinglebin/{bin}',[BinconditionController::class, 'show']);
 Route::get('/useradmin/{id}',[AdminController::class, 'show']);






//bins
    Route::get('/create_bin/{member}/create',[BinController::class,'create']);
    Route::post('/create_bin/post',[BinController::class,'store']);


    Route::get('/bins/{bin}/edit',[BinController::class,'edit']);
    Route::put('/bins/{bin}/update',[BinController::class,'update']);
    Route::get('/bins/status_code/{bin}/{status_code}', [BinController::class, 'updateStatus'])->name('bins.update.status');





    Route::get('/delete/{id}',[BinController::class,'destroy']);
    Route::get('/bins',[BinController::class,'index']);
   // Route::get('/bins',[DistrictController::class,'index']);
    Route::get('/bin/{id}',[BinController::class,'show']);


//user
    Route::get('users/create/',[UserController::class,'create_Admin_User'])->middleware('role:Admin');
    Route::post('/users/store',[UserController::class, 'store']);

    Route::post('/create_vermuser',[UserController::class, 'store']);

    Route::get('/users/{user}/edit',[UserController::class, 'edit'])->middleware('role:Admin');
    Route::put('/users/{user}/update',[UserController::class, 'update'])->middleware('role:Admin');


    Route::get('/delete_vermuser/{id}',[UserController::class, 'destroy'])->middleware('role:Admin');
    Route::get('/logout',[UserController::class,'logout']);

    Route::get('/vermuser/{id}',[UserController::class, 'show'])->middleware('role:Admin');



    Route::get('/conditions/{bin}/create',[BinconditionController::class,'create']);

    Route::get('/conditions/{bin}/edit',[BinconditionController::class,'edit']);
    Route::put('/conditions/{bin}/update',[BinconditionController::class,'update']);



    Route::post('/create_cond',[BinconditionController::class,'store']);



    Route::get('/vermusers',[UserController::class, 'index'])->middleware('role:Admin');
    Route::get('/vermusers/{user}/edit',[UserController::class, 'edit'])->middleware('role:Admin');
    Route::get('/vermusers/status_code/{user_id}/{status_code}', [UserController::class, 'updateStatus'])->name('users.update.status')->middleware('role:Admin');



    Route::get('/activity-logs', [ActivityLogController::class, 'index']);















});



Route::group(['middleware' => ['auth','role:Admin']], function() {
    Route::resource('roles', RoleController::class);

});
