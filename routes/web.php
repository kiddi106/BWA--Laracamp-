<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\DiscountController as AdminDiscount;
use App\Http\Controllers\ContentClassController;
use App\Http\Controllers\ProgramController;

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
})->name('welcome');

// Route::get('checkout/{camp:slug}', function () {
//     return view('checkout');
// })->name('checkout');

// Program Menu
// Route::get('program', [, 'index'])->name('program');
Route::resource('program',ProgramController::class);

// route Socialite
Route::get('sign-in-google',[UserController::class, 'google'])
->name('user.login.google');

Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

// midtrans routes
Route::get('payment/success', [CheckoutController::class, 'midtransCallback']);
Route::post('payment/success', [CheckoutController::class, 'midtransCallback']);




Route::middleware('auth')->group(function (){
    // checkout routes
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('ensureUserRole:user');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create')->middleware('ensureUserRole:user');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('ensureUserRole:user');
    
    //  dashboard 
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    
    // user dashboard
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function ()
    {
       Route::get('/',[UserDashboard::class, 'index'])->name('dashboard');
       Route::get('/profile', [UserDashboard::class, 'profile'])->name('profile');
       Route::post('/storeprofile', [UserDashboard::class, 'storeProfile'])->name('storeprofile');
      //  Route::get('/class/{camp_id}', [UserDashboard::class, 'class'])->name('class');
       Route::get('/class/{camp_id}/{content}', [UserDashboard::class, 'class'])->name('class');
      });
      
      //  user profile

    // admin dashboard
    Route::prefix('admin/dashboard')->name('admin.')->middleware('ensureUserRole:admin')->group(function ()
    {
       Route::get('/',[AdminDashboard::class, 'index'])-> name('dashboard');

    //    admin Checkout
       Route::post('checkout/{checkout}', [AdminCheckout::class, 'update'])->name('checkout.update');

      
       
       //    admin Discount
       Route::resource('discount', AdminDiscount::class);
      //    admin class
       Route::resource('class', ClassController::class );
      //    admin content
      Route::get('createContent/{camp:slug}', [ContentClassController::class, 'createNew'])->name('newContent');
       Route::resource('content', ContentClassController::class);
    });


    
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
