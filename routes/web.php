<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MOPController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\CashinRequestController;
use App\Http\Controllers\SiteAccountController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\SeoPageController;
use App\Http\Controllers\FrontendSeoPageController;

Route::get('/', [HomeHomeController::class, 'index'])->name('home');

Route::get('/pages/about', function () {
    return view('Pages.about');
})->name('pages.about');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');




// /////////////////////////////////////////////////////
// FOR PLAYER ROUTES
// /////////////////////////////////////////////////////

// verify acount site
Route::post('/site-account/store', [SiteAccountController::class, 'store'])->name('siteaccount.store');


// List all pages
Route::get('/page', [FrontendSeoPageController::class, 'index'])->name('page.index');

// Show single page
Route::get('/page/{slug}', [FrontendSeoPageController::class, 'show'])->name('page.show');

// /////////////////////////////////////////////////////
// END FOR PLAYER ROUTES
// /////////////////////////////////////////////////////

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Show Cash-in form
    Route::get('/cashin', [CashinRequestController::class, 'create'])->name('cashin.create');
    Route::post('/cashin/store', [CashinRequestController::class, 'store'])->name('cashin.store');
});

Route::middleware(['role:999'])->group(function () {
    Route::get('/admin/create', [SiteController::class, 'create'])->name('sites.create');
    Route::post('/admin/store', [SiteController::class, 'store'])->name('sites.store');

    Route::resource('cards', CardController::class);

    Route::resource('mop', MOPController::class);

    Route::get('/payouts', [PayoutController::class, 'index'])->name('payouts.index');
    Route::post('/payouts', [PayoutController::class, 'store'])->name('payouts.store');
    Route::delete('/payouts/{payout}', [PayoutController::class, 'destroy'])->name('payouts.destroy');

    Route::resource('posts', PostController::class);
    // routes/web.php
    Route::post('/upload-ckeditor-image', [PostController::class, 'uploadCkeditorImage'])
        ->name('ckeditor.upload')
        ->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);

    // oganization routes
    Route::resource('organization', OrganizationController::class);
    // FAQ routes
    Route::resource('faq', FaqController::class);
    // Testimony routes
    Route::resource('testimonies', TestimonyController::class);

    // Route::get('/pages', function () {
    //     return view('Pages.pages');
    // })->name('pages');

    Route::resource('pages', SeoPageController::class);
});

require __DIR__ . '/auth.php';
