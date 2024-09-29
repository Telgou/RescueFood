<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataCustomerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DemandeController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProfileCustomerController;
use Symfony\Component\HttpKernel\Profiler\Profile;


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

Route::get('/', function () {
    return view('landing_page.home');
});

Route::get('/menu', [MenuController::class, 'landingPage']); 
Route::get('/promo', [PromoController::class, 'landingPage']);
Route::get('/menu_customer', [MenuController::class, 'landingPageCustomer']); 
Route::post('/add_to_cart', [MenuController::class, 'addToCart']); 
Route::get('/promo_customer', [PromoController::class, 'landingPageCustomer']);





Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});


Route::get('/banner-1', function (){
    return view('banner.banner-1');
});

Route::get('/banner-2', function (){
    return view('banner.banner-2');
});

Route::get('/banner-3', function (){
    return view('banner.banner-3');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('data_customer', DataCustomerController::class)->parameters([
        'data_customer' => 'user'
    ]);
    Route::resource('promos', PromoController::class);
    Route::get('/daftar-toko', [MitraController::class, 'dataNamaToko'])->name('daftar_toko.index');

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::get('/artikels', [ArtikelController::class, 'index'])->name('artikels.index');
        Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
        Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
        Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
        Route::get('/artikel/{artikel}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
        Route::put('/artikel/{artikel}', [ArtikelController::class, 'update'])->name('artikel.update');
        Route::delete('/artikel/{artikel}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    });
});

Route::middleware(['auth', 'role:mitra'])->group(function () {
    Route::resource('menus', MenuController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('orders', OrderController::class);
    Route::prefix('mitra')->group(function () {
        Route::get('dashboard', function () {
            return view('mitra.dashboard');
        })->name('mitra.dashboard');
    });

});


Route::middleware('auth')->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('dashboard', function () {
            return view('customer.dashboard');
        })->name('customer.dashboard');
        
    });
});
Route::post('/add_to_cart', [MenuController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');
Route::post('/apply-promo', [CartController::class, 'applyPromo'])->name('applyPromo');
Route::post('/cart/store-order', [PromoController::class, 'storeOrder'])->name('orders.create');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/customer/orders', [CustomerController::class, 'orders'])->name('customer.orders');

Route::get('/registrasi_mitra', function (){
    return view('customer.form');
});
Route::get('/mitra/create', [MitraController::class, 'create'])->name('mitra.create');
Route::post('/mitra/store', [MitraController::class, 'store'])->name('mitra.store');
Route::get('/verifikasi_mitra', function (){
    return view('admin.list_mitra.verifikasi');
});
Route::get('/dashboard', function (){
    return view('admin.dashboard');
});
Route::get('/verifikasi_mitra', [MitraController::class, 'index'])->name('verifikasi_mitra');
Route::get('/lihat_data_mitra', function (){
    return view('admin.list_mitra.show');
});
Route::get('/mitra/{id}', [MitraController::class, 'show'])->name('admin.list_mitra.show');
Route::post('/mitra/{id}/accept', [MitraController::class, 'accept'])->name('mitra.accept');
Route::get('/profil_customer', function (){
    return view('customer.profil');
});
Route::get('/customer/artikel', [ArtikelController::class, 'reading'])->name('customer.artikel');
Route::get('/landing_page/artikel', [ArtikelController::class, 'read'])->name('landing_page.artikel');




Route::get('/menus/create', [MitraController::class, 'listNamaToko'])->name('menus.create');
Route::middleware(['auth'])->group(function () {
    Route::resource('menus', MenuController::class);
});
Route::delete('cart/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::patch('/cart/update/{rowId}', [CartController::class, 'update']);
Route::get('/cart/total', [CartController::class, 'getTotal']);
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/landing_page/artikel/{id}', [ArtikelController::class, 'show'])->name('landing_page.show_artikel');
Route::get('/customer/artikel/{id}', [ArtikelController::class, 'show_customer'])->name('customer.show_artikel');


Route::post('/check-association', [DemandeController::class, 'checkAssociation'])->name('check.association');
Route::get('/demandes/create', [DemandeController::class, 'create'])->name('demandes.create');
Route::post('/demandes', [DemandeController::class, 'store'])->name('demandes.store');

Route::get('/mes-demandes', [DemandeController::class, 'mesDemandes'])->name('demandes.mesdemandes');

Route::delete('/demandes/{id}', [DemandeController::class, 'destroy'])->name('demandes.destroy');
Route::get('/demandes/{id}/edit', [DemandeController::class, 'edit'])->name('demandes.edit');
Route::put('/demandes/{id}', [DemandeController::class, 'update'])->name('demandes.update');
