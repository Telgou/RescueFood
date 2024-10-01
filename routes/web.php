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
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantController;
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
        Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
        Route::get('/food', [FoodController::class, 'index'])->name('food.index');
        Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
        Route::post('/food', [FoodController::class, 'store'])->name('food.store');
        Route::get('/food/{food}/edit', [FoodController::class, 'edit'])->name('food.edit');
        Route::put('/food/{food}', [FoodController::class, 'update'])->name('food.update');
        Route::delete('/food/{food}', [FoodController::class, 'destroy'])->name('food.destroy');
    });
});
            
Route::middleware(['auth', 'role:restaurant'])->group(function () {
    
    Route::resource('menus', MenuController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('orders', OrderController::class);
    Route::prefix('restaurant')->group(function () {
        Route::get('dashboard', function () {
            return view('restaurant.dashboard');
        })->name('restaurant.dashboard');
        /*Route::get('food', function () {
            return view('food.index');
        })->name('food.index');*/
        // Food routes
        Route::get('food', [FoodController::class, 'index'])->name('food.index');
                    Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
                    Route::post('/food', [FoodController::class, 'store'])->name('food.store');
                    Route::get('/food/{id}/edit', [FoodController::class, 'edit'])->name('food.edit');
                    Route::put('/food/{id}', [FoodController::class, 'update'])->name('food.update');
                    Route::delete('/food/{id}', [FoodController::class, 'destroy'])->name('food.destroy');
        

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
Route::get('/customer/food', [FoodController::class, 'reading'])->name('customer.food');
Route::get('/landing_page/food', [FoodController::class, 'read'])->name('landing_page.food');




Route::get('/menus/create', [MitraController::class, 'listNamaToko'])->name('menus.create');
Route::middleware(['auth'])->group(function () {
    Route::resource('menus', MenuController::class);
});
Route::delete('cart/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::patch('/cart/update/{rowId}', [CartController::class, 'update']);
Route::get('/cart/total', [CartController::class, 'getTotal']);
Route::get('/food/{id}', [FoodController::class, 'show'])->name('food.show');
Route::get('/landing_page/food/{id}', [FoodController::class, 'show'])->name('landing_page.show_food');
Route::get('/customer/food/{id}', [FoodController::class, 'show_customer'])->name('customer.show_food');


Route::post('/check-association', [DemandeController::class, 'checkAssociation'])->name('check.association');
Route::get('/demandes/create', [DemandeController::class, 'create'])->name('demandes.create');
Route::post('/demandes', [DemandeController::class, 'store'])->name('demandes.store');

Route::get('/mes-demandes', [DemandeController::class, 'mesDemandes'])->name('demandes.mesdemandes');

Route::delete('/demandes/{id}', [DemandeController::class, 'destroy'])->name('demandes.destroy');
Route::get('/demandes/{id}/edit', [DemandeController::class, 'edit'])->name('demandes.edit');
Route::put('/demandes/{id}', [DemandeController::class, 'update'])->name('demandes.update');

Route::get('/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');
Route::put('/update', [RestaurantController::class, 'update'])->name('restaurant.update');
