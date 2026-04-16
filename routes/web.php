<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

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

// Admin Authentication Routes (Guest Only)
Route::middleware(['redirectIfUserLogin', 'throttle:60,1'])->prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/logincheck', [AuthController::class, 'logincheck'])->name('admin.logincheck');
    Route::match(['get', 'post'], '/forgotpassword/{token?}', [AuthController::class, 'forgotpassword'])->name('admin.forgotpassword');
});

// Admin Protected Routes
Route::middleware(['checkUserSession'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    
    // Profile & Auth
    Route::match(['get', 'post'], '/profile', [AuthController::class, 'profile'])->name('admin.profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::match(['get', 'post'], '/changepassword', [AuthController::class, 'changepassword'])->name('admin.changepassword');

    // Roles Resource
    Route::resource('roles', AdminController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::get('/roles/{id}/edit', [AdminController::class, 'editRole'])->name('roles.edit');

    // Features Resource
    Route::resource('features', AdminController::class)->only(['index', 'store', 'update', 'destroy'])->names([
        'index' => 'features.index',
        'store' => 'features.store',
        'update' => 'features.update',
        'destroy' => 'features.destroy',
    ]);
    Route::get('/features/{id}/edit', [AdminController::class, 'editFeature'])->name('features.edit');

    // Platform Resource
    Route::resource('platform', AdminController::class)->only(['index', 'store', 'update', 'destroy'])->names([
        'index' => 'platform.index',
        'store' => 'platform.store',
        'update' => 'platform.update',
        'destroy' => 'platform.destroy',
    ]);
    Route::get('/platform/{id}/edit', [AdminController::class, 'editPlatform'])->name('platform.edit');

    // Stores Resource
    Route::resource('stores', AdminController::class)->names([
        'index' => 'stores.index',
        'create' => 'stores.create',
        'store' => 'stores.store',
        'show' => 'stores.show',
        'edit' => 'stores.edit',
        'update' => 'stores.update',
        'destroy' => 'stores.destroy',
    ]);
    Route::get('/stores/data/{id}', [AdminController::class, 'getstoresdata'])->name('stores.data');
    Route::get('/stores/{id}/details', [AdminController::class, 'storeDetails'])->name('stores.details');
    Route::post('/stores/update', [AdminController::class, 'storesupdate'])->name('stores.customUpdate');
    Route::post('/stores/status', [AdminController::class, 'storestatus'])->name('stores.status');

    // Staff Resource
    Route::resource('staff', AdminController::class)->names([
        'index' => 'staff.index',
        'create' => 'staff.create',
        'store' => 'staff.store',
        'show' => 'staff.show',
        'edit' => 'staff.edit',
        'update' => 'staff.update',
        'destroy' => 'staff.destroy',
    ]);
    Route::get('/staff/data/ajax', [AdminController::class, 'staffajaxdata'])->name('staff.ajax');
    Route::get('/staff/rolepermissions/{role_id}/{user_id?}', [AdminController::class, 'getrolepermissions'])->name('staff.permissions');
    Route::get('/staff/data/{id}', [AdminController::class, 'getstaffdata'])->name('staff.data');
    Route::post('/staff/update', [AdminController::class, 'staffupdate'])->name('staff.customUpdate');
    Route::post('/staff/status', [AdminController::class, 'staffstatus'])->name('staff.status');
    Route::post('/staff/check-username', [AdminController::class, 'checkUsername'])->name('staff.checkUsername');
    Route::post('/staff/check-email', [AdminController::class, 'checkEmail'])->name('staff.checkEmail');

    // Transactions Resource
    Route::resource('transactions', AdminController::class)->only(['index', 'show'])->names([
        'index' => 'transactions.index',
        'show' => 'transactions.show',
    ]);
    Route::get('/transactions/data/ajax', [AdminController::class, 'transactionsajaxdata'])->name('transactions.ajax');

    // Payouts
    Route::get('/payouts', [PaymentController::class, 'payouts'])->name('payouts.index');

    // Transfer Store
    Route::match(['get', 'post'], '/transfer-transaction', [AdminController::class, 'transferStoretransaction'])->name('transfer.transaction');

    // Reports
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports.index');
    Route::get('/reports/data', [AdminController::class, 'getallreportdata'])->name('reports.data');
    Route::get('/reports/print', [AdminController::class, 'printstorereport'])->name('reports.print');

    Route::get('/shiftreports', [AdminController::class, 'shiftreports'])->name('shiftreports.index');
    Route::get('/shiftreports/data', [AdminController::class, 'getallshiftreportdata'])->name('shiftreports.data');
    Route::get('/shiftreports/print', [AdminController::class, 'printshiftreport'])->name('shiftreports.print');
    Route::get('/shiftreports/printstaff', [AdminController::class, 'printshiftstaffreport'])->name('shiftreports.printStaff');

    // Withdrawals Resource
    Route::resource('withdrawals', AdminController::class)->names([
        'index' => 'withdrawals.index',
        'create' => 'withdrawals.create',
        'store' => 'withdrawals.store',
        'show' => 'withdrawals.show',
        'edit' => 'withdrawals.edit',
        'update' => 'withdrawals.update',
        'destroy' => 'withdrawals.destroy',
    ]);
    Route::get('/withdrawals/data/ajax', [AdminController::class, 'withdrawalsajaxdata'])->name('withdrawals.ajax');
    Route::get('/withdrawals/data/{id}', [AdminController::class, 'getwithdrawdata'])->name('withdrawals.data');
    Route::post('/withdrawals/status', [AdminController::class, 'withdrawalstatus'])->name('withdrawals.status');
    Route::delete('/withdrawals/data/delete', [AdminController::class, 'deletewithdrawaldata'])->name('withdrawals.deleteData');

    // Leads Resource
    Route::resource('leads', LeadController::class)->names([
        'index' => 'leads.index',
        'create' => 'leads.create',
        'store' => 'leads.store',
        'show' => 'leads.show',
        'edit' => 'leads.edit',
        'update' => 'leads.update',
        'destroy' => 'leads.destroy',
    ]);
    Route::get('/leads/data/ajax', [LeadController::class, 'leadajaxdata'])->name('leads.ajax');
    Route::post('/leads/followup', [LeadController::class, 'leadfollowup'])->name('leads.followup');
    Route::get('/leads/history/{id}', [LeadController::class, 'leadhistory'])->name('leads.history');
    Route::post('/leads/status', [LeadController::class, 'leadstatus'])->name('leads.status');
    Route::post('/leads/cancel', [LeadController::class, 'leadcancel'])->name('leads.cancel');
    Route::post('/leads/mail', [LeadController::class, 'leadmail'])->name('leads.mail');
    Route::post('/notifications/read/{id}', [LeadController::class, 'readnotification'])->name('notifications.read');
    Route::post('/notifications/readall', [LeadController::class, 'readallnotifications'])->name('notifications.readAll');

    // Gallery Resource
    Route::resource('gallery', AdminController::class)->names([
        'index' => 'gallery.index',
        'create' => 'gallery.create',
        'store' => 'gallery.store',
        'show' => 'gallery.show',
        'edit' => 'gallery.edit',
        'update' => 'gallery.update',
        'destroy' => 'gallery.destroy',
    ]);
    Route::get('/gallery/data/{id}', [AdminController::class, 'getgallerydata'])->name('gallery.data');
    Route::post('/gallery/update', [AdminController::class, 'galleryupdate'])->name('gallery.customUpdate');

    // Slider Resource
    Route::resource('slider', AdminController::class)->names([
        'index' => 'slider.index',
        'create' => 'slider.create',
        'store' => 'slider.store',
        'show' => 'slider.show',
        'edit' => 'slider.edit',
        'update' => 'slider.update',
        'destroy' => 'slider.destroy',
    ]);
    Route::get('/slider/data/{id}', [AdminController::class, 'getsliderdata'])->name('slider.data');
    Route::post('/slider/update', [AdminController::class, 'sliderupdate'])->name('slider.customUpdate');

    // Category Resource
    Route::resource('category', AdminController::class)->names([
        'index' => 'category.index',
        'create' => 'category.create',
        'store' => 'category.store',
        'show' => 'category.show',
        'edit' => 'category.edit',
        'update' => 'category.update',
        'destroy' => 'category.destroy',
    ]);
    Route::get('/category/data/{id}', [AdminController::class, 'getcateorydata'])->name('category.data');
    Route::post('/category/update', [AdminController::class, 'categoryupdate'])->name('category.customUpdate');
    Route::delete('/category/data/delete', [AdminController::class, 'deletecategorydata'])->name('category.deleteData');
    Route::delete('/category/data/deleteall', [AdminController::class, 'deleteallcategorydata'])->name('category.deleteAll');

    // Page Resource
    Route::resource('page', PageController::class)->names([
        'index' => 'page.index',
        'create' => 'page.create',
        'store' => 'page.store',
        'show' => 'page.show',
        'edit' => 'page.edit',
        'update' => 'page.update',
        'destroy' => 'page.destroy',
    ]);
    Route::match(['get', 'post'], '/page/addupdate/{id?}', [PageController::class, 'addupdatepage'])->name('page.addupdate');
    Route::get('/page/subcategories/{id}', [PageController::class, 'getsubcategories'])->name('page.subcategories');
    Route::get('/page/data/ajax', [PageController::class, 'pageajaxdata'])->name('page.ajax');
    Route::post('/page/status', [PageController::class, 'pagestatus'])->name('page.status');

    // Blog Routes
    Route::resource('blogcategory', BlogController::class)->only(['index', 'store', 'update', 'destroy'])->names([
        'index' => 'blogcategory.index',
        'store' => 'blogcategory.store',
        'update' => 'blogcategory.update',
        'destroy' => 'blogcategory.destroy',
    ]);
    Route::get('/blogcategory/{id}/edit', [BlogController::class, 'editBlogCategory'])->name('blogcategory.edit');

    Route::resource('blog', BlogController::class)->names([
        'index' => 'blog.index',
        'create' => 'blog.create',
        'store' => 'blog.store',
        'show' => 'blog.show',
        'edit' => 'blog.edit',
        'update' => 'blog.update',
        'destroy' => 'blog.destroy',
    ]);
    Route::match(['get', 'post'], '/blog/addupdate/{id?}', [BlogController::class, 'addupdateblog'])->name('blog.addupdate');
    Route::get('/blog/data/ajax', [BlogController::class, 'blogajaxdata'])->name('blog.ajax');
    Route::post('/blog/status', [BlogController::class, 'blogstatus'])->name('blog.status');

    // Comments
    Route::resource('comment', BlogController::class)->only(['index', 'store', 'update', 'destroy'])->names([
        'index' => 'comment.index',
        'store' => 'comment.store',
        'update' => 'comment.update',
        'destroy' => 'comment.destroy',
    ]);
    Route::get('/comment/data/ajax/{id?}', [BlogController::class, 'commentajaxdata'])->name('comment.ajax');
    Route::post('/comment/status', [BlogController::class, 'blogcommentstatus'])->name('comment.status');

    // Event Resource
    Route::resource('events', EventController::class)->names([
        'index' => 'events.index',
        'create' => 'events.create',
        'store' => 'events.store',
        'show' => 'events.show',
        'edit' => 'events.edit',
        'update' => 'events.update',
        'destroy' => 'events.destroy',
    ]);
    Route::match(['get', 'post'], '/events/addupdate/{id?}', [EventController::class, 'addupdateevent'])->name('events.addupdate');
    Route::get('/events/data/ajax', [EventController::class, 'eventajaxdata'])->name('events.ajax');
    Route::post('/events/status', [EventController::class, 'eventstatus'])->name('events.status');

    // Page/Blog/Event Section & Content Management
    Route::delete('/section/{id}', [AdminController::class, 'deletesection'])->name('section.destroy');
    Route::delete('/content/{id}', [AdminController::class, 'deletecontent'])->name('content.destroy');
    Route::delete('/page/data/delete', [AdminController::class, 'deletepagedata'])->name('page.deleteData');
    Route::delete('/page/data/deleteall', [AdminController::class, 'deleteallpagedata'])->name('page.deleteAllData');

    // Testimonials Resource
    Route::resource('testimonials', AdminController::class)->names([
        'index' => 'testimonials.index',
        'create' => 'testimonials.create',
        'store' => 'testimonials.store',
        'show' => 'testimonials.show',
        'edit' => 'testimonials.edit',
        'update' => 'testimonials.update',
        'destroy' => 'testimonials.destroy',
    ]);
    Route::get('/testimonials/data/{id}', [AdminController::class, 'gettestimonialdata'])->name('testimonials.data');
    Route::post('/testimonials/update', [AdminController::class, 'testimonialsupdate'])->name('testimonials.customUpdate');

    // Country Resource
    Route::resource('country', AdminController::class)->names([
        'index' => 'country.index',
        'create' => 'country.create',
        'store' => 'country.store',
        'show' => 'country.show',
        'edit' => 'country.edit',
        'update' => 'country.update',
        'destroy' => 'country.destroy',
    ]);
    Route::get('/country/data/ajax', [AdminController::class, 'countryajaxdata'])->name('country.ajax');

    // State Resource
    Route::resource('state', AdminController::class)->names([
        'index' => 'state.index',
        'create' => 'state.create',
        'store' => 'state.store',
        'show' => 'state.show',
        'edit' => 'state.edit',
        'update' => 'state.update',
        'destroy' => 'state.destroy',
    ]);
    Route::get('/state/data/ajax', [AdminController::class, 'stateajaxdata'])->name('state.ajax');

    // City Resource
    Route::resource('city', AdminController::class)->names([
        'index' => 'city.index',
        'create' => 'city.create',
        'store' => 'city.store',
        'show' => 'city.show',
        'edit' => 'city.edit',
        'update' => 'city.update',
        'destroy' => 'city.destroy',
    ]);
    Route::get('/city/data/ajax', [AdminController::class, 'cityajaxdata'])->name('city.ajax');
    Route::get('/city/states/{id}', [AdminController::class, 'getstates'])->name('city.states');

    // Subscribe Resource
    Route::resource('subscribe', AdminController::class)->only(['index', 'destroy'])->names([
        'index' => 'subscribe.index',
        'destroy' => 'subscribe.destroy',
    ]);
    Route::get('/subscribe/data/ajax', [AdminController::class, 'subscribeajaxdata'])->name('subscribe.ajax');

    // Email Marketing
    Route::match(['get', 'post'], '/emailmarketing', [AdminController::class, 'emailmarketing'])->name('emailmarketing.index');
    Route::match(['get', 'post'], '/emailmarketing/campaign', [AdminController::class, 'emailmarketingcampaign'])->name('emailmarketing.campaign');

    // General Settings
    Route::match(['get', 'post'], '/websetting/{id?}', [AdminController::class, 'websetting'])->name('websetting.index');
    Route::match(['get', 'post'], '/userheader', [AdminController::class, 'userheader'])->name('userheader.index');
    Route::match(['get', 'post'], '/userfooter', [AdminController::class, 'userfooter'])->name('userfooter.index');
    Route::match(['get', 'post'], '/socialmedia/{id?}', [AdminController::class, 'socialmedia'])->name('socialmedia.index');
    Route::match(['get', 'post'], '/emailtemplate/{id?}', [AdminController::class, 'emailtemplate'])->name('emailtemplate.index');
    Route::delete('/emailtemplate/attachment/{id}', [AdminController::class, 'deleteemailattachment'])->name('emailtemplate.deleteAttachment');
    Route::delete('/contactinfo/{id}', [AdminController::class, 'deletecontactinfo'])->name('contactinfo.destroy');
    Route::delete('/emailinfo/{id}', [AdminController::class, 'deleteemailinfo'])->name('emailinfo.destroy');

    // SEO
    Route::match(['get', 'post'], '/sitemap', [AdminController::class, 'sitemap'])->name('seo.sitemap');
    Route::match(['get', 'post'], '/robots', [AdminController::class, 'robots'])->name('seo.robots');
    Route::post('/generatexml', [AdminController::class, 'generatexml'])->name('seo.generatexml');

    // General Data Deletion
    Route::delete('/data/delete', [AdminController::class, 'deletedata'])->name('data.delete');
    Route::delete('/data/deleteall', [AdminController::class, 'deletealldata'])->name('data.deleteAll');

    // FAQ Resource
    Route::resource('faq', AdminController::class)->names([
        'index' => 'faq.index',
        'create' => 'faq.create',
        'store' => 'faq.store',
        'show' => 'faq.show',
        'edit' => 'faq.edit',
        'update' => 'faq.update',
        'destroy' => 'faq.destroy',
    ]);

    // Location Fetch APIs
    Route::post('/locations/fetch-countries', [AdminController::class, 'fetchAndStoreCountries'])->name('locations.fetchCountries');
    Route::post('/locations/fetch-states', [AdminController::class, 'fetchAndStoreStates'])->name('locations.fetchStates');
    Route::post('/locations/fetch-cities', [AdminController::class, 'fetchAndStoreCities'])->name('locations.fetchCities');
});

// Payment Routes
Route::get('/pay/{store}', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession'])->middleware('throttle:60,1')->name('payment.checkout');
Route::get('/payment-success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment-cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
Route::post('/stripe/webhook', [PaymentController::class, 'webhook'])->middleware('throttle:60,1')->name('stripe.webhook');

Route::post('/paypal-capture', [PaymentController::class, 'capturePaypal'])->middleware('throttle:60,1')->name('paypal.capture');
Route::get('/paypal-success/{token}', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
Route::get('/paypal-cancel', [PaymentController::class, 'paypalcancel'])->name('paypal.cancel');

// User Frontend Routes
Route::get('/{url?}/{id?}', [UserController::class, 'index'])->middleware('throttle:200,1')->name('user.index');