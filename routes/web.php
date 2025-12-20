<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\TransactionController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\MidtransCallbackController;
use App\Http\Controllers\Frontend\MidtransWebhookController;
use App\Http\Controllers\Frontend\MidtransTestController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PromotionController;
use App\Http\Controllers\PakaianController;
use App\Http\Controllers\PulpenController;
use App\Http\Controllers\PameranController;
use App\Http\Controllers\FlyerController;
use App\Http\Controllers\BrosurLipatController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\BrosurController;
use App\Http\Controllers\ProdukBaruController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\IdeHadiahController;
use App\Http\Controllers\SampelProdukController;
use App\Http\Controllers\JumlahSedikitController;
use App\Http\Controllers\CekCetakCepatController;
use App\Http\Controllers\DesainProdukController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TasController;
use App\Http\Controllers\PapanTandaController;
use App\Http\Controllers\KartuNamaController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\KartuUcapanController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\CloudAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Tambahkan ->name('login.store') di sini
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/logout', LogoutController::class)->name('logout');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('auth');

// Google Auth Routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/product/{id}', [HomeController::class, 'show'])->name("product");
Route::get('/promotion', [PromotionController::class, 'index'])->name("promotion");
Route::get('/pakaian', [PakaianController::class, 'index'])->name('pakaian');
Route::get('/pulpen', [PulpenController::class, 'index'])->name('pulpen');
Route::get('/pameran', [PameranController::class, 'index'])->name('pameran');
Route::get('/flyer', [FlyerController::class, 'index'])->name('flyer');
Route::get('/brosur-lipat', [BrosurLipatController::class, 'index'])->name('brosur-lipat');
Route::get('/poster', [PosterController::class, 'index'])->name('poster');
Route::get('/brosur', [BrosurController::class, 'index'])->name('brosur');
Route::get('/produk-baru', [ProdukBaruController::class, 'index'])->name('produk-baru');
Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender');
Route::get('/ide-hadiah', [IdeHadiahController::class, 'index'])->name('ide-hadiah');
Route::get('/sampel-produk', [SampelProdukController::class, 'index'])->name('sampel-produk');
Route::get('/sampel-produk/kertas', [SampelProdukController::class, 'paperSamples'])->name('sampel-kertas');
Route::get('/sampel-produk/kertas/{slug}', [SampelProdukController::class, 'paperSampleDetail'])->name('sampel-kertas-detail');
Route::get('/sampel-produk/business-card', [SampelProdukController::class, 'businessCardSample'])->name('business-card-sample');
Route::get('/sampel-produk/colour-chart', [SampelProdukController::class, 'colourChartSample'])->name('colour-chart-sample');
Route::get('/jumlah-sedikit', [JumlahSedikitController::class, 'index'])->name('jumlah-sedikit');
Route::get('/cek-cetak-cepat', [CekCetakCepatController::class, 'index'])->name('cek-cetak-cepat');
Route::get('/kartu-ucapan', [KartuUcapanController::class, 'index'])->name('kartu-ucapan');
Route::get('/desain-produk', [DesainProdukController::class, 'index'])->name('desain-produk');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/tas', [TasController::class, 'index'])->name('tas');
Route::get('/papan-tanda', [PapanTandaController::class, 'index'])->name('papan-tanda');
Route::get('/kartu-nama', [KartuNamaController::class, 'index'])->name('kartu-nama');

// Protected Routes
Route::post('/checkout', [CheckoutController::class, 'process'])->name("checkout-process");
Route::get('/checkout/{transaction}', [CheckoutController::class, 'checkout'])->name("checkout");

Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{id}/check-payment', [OrderController::class, 'checkPayment'])->name('orders.check-payment');

Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

// Midtrans Webhook - PENTING: Jangan pakai middleware auth di route ini karena Midtrans bukan user biasa
// Route ini hanya menerima request dari Midtrans dengan signature verification
Route::post('/webhook/midtrans', [MidtransWebhookController::class, 'handle'])
    ->name('webhook.midtrans')
    ->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class); // Bypass CSRF karena dari external service

// Midtrans Testing Routes (DEVELOPMENT ONLY - Hapus di production)
if (app()->isLocal()) {
    Route::prefix('webhook/midtrans/test')->name('test.webhook.')->group(function () {
        Route::post('/', [MidtransTestController::class, 'simulateCallback'])->name('midtrans');
        Route::get('/', [MidtransTestController::class, 'simulateCallback'])->name('midtrans');
        Route::get('/orders', [MidtransTestController::class, 'listOrders'])->name('orders');
        Route::get('/orders/{orderNumber}', [MidtransTestController::class, 'checkOrder'])->name('order');
    });
}

// Debug Routes (Temporary - untuk troubleshooting)
Route::prefix('debug')->name('debug.')->group(function () {
    Route::get('/statuses', [\App\Http\Controllers\DebugController::class, 'checkStatuses'])->name('statuses');
    Route::get('/payment-types', [\App\Http\Controllers\DebugController::class, 'checkPaymentTypes'])->name('payment-types');
    Route::get('/orders', [\App\Http\Controllers\DebugController::class, 'checkOrders'])->name('orders');
    Route::get('/seed', [\App\Http\Controllers\SeedDatabaseController::class, 'seed'])->name('seed');
});

// Cloud Admin Routes (Web Production)
Route::prefix('cloud-admin')->name('cloud-admin.')->group(function () {
    Route::get('/login', [CloudAdminController::class, 'login'])->name('login');
    Route::post('/login', [CloudAdminController::class, 'postLogin'])->name('post-login');
    
    Route::middleware('check.cloud.admin')->group(function () {
        Route::get('/dashboard', [CloudAdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [CloudAdminController::class, 'logout'])->name('logout');
    });
});