<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminThemeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - OYL Legacy Turnkey E-Commerce Platform
|--------------------------------------------------------------------------
*/

// Public Front-End Navigation
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/pages', [PageController::class, 'pageList'])->name('pages.index');
Route::get('/about-us', [PageController::class, 'about'])->name('about');

// Services Pages
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/amazon-book-publishing', [PageController::class, 'amazonBook'])->name('amazon-book');
    Route::get('/tiktok-shop-automation', [PageController::class, 'tiktok'])->name('tiktok');
    Route::get('/walmart-automation', [PageController::class, 'walmart'])->name('walmart');
    Route::get('/shopify-automation', [PageController::class, 'shopify'])->name('shopify');
    Route::get('/ebay-automation', [PageController::class, 'ebay'])->name('ebay');
    Route::get('/noon-store', [PageController::class, 'noon'])->name('noon');
});

// Direct service alias routes for exact compatibility
Route::get('/amazon-book-publishing', [PageController::class, 'amazonBook']);
Route::get('/tiktok-shop-automation', [PageController::class, 'tiktok']);
Route::get('/walmart-automation', [PageController::class, 'walmart']);
Route::get('/shopify-automation', [PageController::class, 'shopify']);
Route::get('/ebay-automation', [PageController::class, 'ebay']);
Route::get('/noon-store', [PageController::class, 'noon']);

// Contact & Lead Generation
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact');
Route::get('/free-consultation', [PageController::class, 'consultation'])->name('consultation');
Route::post('/lead/submit', [LeadController::class, 'store'])->name('lead.store');
Route::post('/contact-us', [LeadController::class, 'store']);
Route::post('/free-consultation', [LeadController::class, 'store']);

// Blog Pages
Route::get('/blog', [PageController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{slug}', [PageController::class, 'blogShow'])->name('blog.show');

// Compliance & Policy Pages (Website Compliance Readiness Standard)
Route::get('/terms-conditions', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/refund-policy', [PageController::class, 'refundPolicy'])->name('refund-policy');
Route::get('/fulfillment-policy', [PageController::class, 'fulfillmentPolicy'])->name('fulfillment-policy');
Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');

// Admin Authentication Gateway (Database-Synced Generic Password)
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Secured Unified Theme Control Center & OYL Legacy Admin Panel
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminThemeController::class, 'index'])->name('dashboard');
    Route::get('/theme-control', [AdminThemeController::class, 'index'])->name('theme-control');
    Route::post('/settings', [AdminThemeController::class, 'updateSettings'])->name('settings.update');
    Route::post('/password', [AdminAuthController::class, 'updatePassword'])->name('password.update');
    Route::post('/packages', [AdminThemeController::class, 'storePackage'])->name('packages.store');
    Route::post('/packages/{package}', [AdminThemeController::class, 'updatePackage'])->name('packages.update');
    Route::post('/leads/{lead}/status', [AdminThemeController::class, 'updateLeadStatus'])->name('leads.status');
    Route::delete('/leads/{lead}', [AdminThemeController::class, 'destroyLead'])->name('leads.destroy');
});

// One-Click Web Database Migration & Cache Setup for cPanel / Shared Hosting
Route::get('/deploy/install', function (\Illuminate\Http\Request $request) {
    if ($request->query('secret') !== 'yllegacy2026') {
        abort(403, 'Unauthorized setup access.');
    }

    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
        $migrateOutput = \Illuminate\Support\Facades\Artisan::output();

        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        $optimizeOutput = \Illuminate\Support\Facades\Artisan::output();

        return response("<h2>✅ YL Legacy Database & Theme Setup Complete!</h2><pre style='background:#1e293b;color:#f8fafc;padding:20px;border-radius:8px;'><strong>Migrations & Seed:</strong>\n" . htmlspecialchars($migrateOutput) . "\n\n<strong>Cache Cleared:</strong>\n" . htmlspecialchars($optimizeOutput) . "</pre><p><a href='/admin' style='display:inline-block;background:#f88902;color:#fff;padding:10px 20px;text-decoration:none;border-radius:6px;font-weight:bold;'>Go to Admin Login →</a></p>");
    } catch (\Throwable $e) {
        return response("<h2>❌ Setup Error:</h2><pre style='background:#fee2e2;color:#991b1b;padding:20px;border-radius:8px;'>" . htmlspecialchars($e->getMessage()) . "\n\n" . htmlspecialchars($e->getTraceAsString()) . "</pre>", 500);
    }
});
