<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\User;
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

// admin panel
Route::middleware(['redirectIfUserLogin', 'throttle:60,1'])->group(function () {
    Route::any('/admin/login', [Admin::class, 'login']);
    Route::any('/admin/logincheck', [Admin::class, 'logincheck']);
    Route::any('admin/forgotpassword/{token?}', [Admin::class, 'forgotpassword']);
});

Route::middleware(['checkUserSession'])->group(function () {
    Route::any('admin/dashboard', [Admin::class, 'dashboard']);
    Route::any('admin/profile', [Admin::class, 'profile']);
    Route::any('admin/logout', [Admin::class, 'logout']);
    Route::any('admin/changepassword', [Admin::class, 'changepassword']);

    //roles 
    Route::any('/admin/roles/{id?}', [Admin::class, 'roles']);

    //features 
    Route::any('/admin/features/{id?}', [Admin::class, 'features']);

    // platform
    Route::any('/admin/platform/{id?}', [Admin::class, 'platform']);

    //stores 
    Route::any('/admin/stores/{id?}', [Admin::class, 'stores']);
    Route::any('/admin/getstoresdata/{id}', [Admin::class, 'getstoresdata']);
    Route::any('/admin/store-details/{id}', [Admin::class, 'storeDetails']);
    Route::any('/admin/storesupdate', [Admin::class, 'storesupdate']);
    Route::any('/admin/storestatus', [Admin::class, 'storestatus']);

    //staff 
    Route::any('/admin/staff/{id?}', [Admin::class, 'staff']);
    Route::any('/admin/staffajaxdata', [Admin::class, 'staffajaxdata']);
    Route::any('/admin/getrolepermissions/{role_id}/{user_id?}', [Admin::class, 'getrolepermissions']);
    Route::any('/admin/getstaffdata/{id}', [Admin::class, 'getstaffdata']);
    Route::any('/admin/staffupdate', [Admin::class, 'staffupdate']);
    Route::any('/admin/staffstatus', [Admin::class, 'staffstatus']);
    Route::any('/admin/check-username', [Admin::class, 'checkUsername']);
    Route::any('/admin/check-email', [Admin::class, 'checkEmail']);

    //transactions 
    Route::any('/admin/transactions/{id?}', [Admin::class, 'transactions']);
    Route::any('/admin/transactionsajaxdata', [Admin::class, 'transactionsajaxdata']);

    //payout 
    Route::any('/admin/payouts', [PaymentController::class, 'payouts']);

    // Transfer Store
    Route::any('/admin/transfer-transaction', [Admin::class, 'transferStoretransaction']);

    //reports 
    Route::any('/admin/reports', [Admin::class, 'reports']);
    Route::any('/admin/getallreportdata', [Admin::class, 'getallreportdata']);
    Route::any('/admin/printstorereport', [Admin::class, 'printstorereport']);

    Route::any('/admin/shiftreports', [Admin::class, 'shiftreports']);
    Route::any('/admin/getallshiftreportdata', [Admin::class, 'getallshiftreportdata']);
    Route::any('/admin/printshiftreport', [Admin::class, 'printshiftreport']);
    Route::any('/admin/printshiftstaffreport', [Admin::class, 'printshiftstaffreport']);

    //withdrawals
    Route::any('/admin/withdrawals/{id?}', [Admin::class, 'withdrawals']);
    Route::any('/admin/withdrawalsajaxdata', [Admin::class, 'withdrawalsajaxdata']);
    Route::any('/admin/getwithdrawdata/{id}', [Admin::class, 'getwithdrawdata']);
    Route::any('/admin/withdrawalstatus', [Admin::class, 'withdrawalstatus']);
    Route::any('/admin/deletewithdrawaldata', [Admin::class, 'deletewithdrawaldata']);

    // Lead
    Route::any('/admin/leads/{id?}', [Admin::class, 'leads']);
    Route::any('/admin/leadajaxdata', [Admin::class, 'leadajaxdata']);
    Route::any('/admin/leadfollowup', [Admin::class, 'leadfollowup']);
    Route::any('/admin/leadhistory/{id}', [Admin::class, 'leadhistory']);
    Route::any('/admin/leadstatus', [Admin::class, 'leadstatus']);
    Route::any('/admin/leadcancel', [Admin::class, 'leadcancel']);
    Route::any('/admin/leadmail', [Admin::class, 'leadmail']);
    Route::any('/admin/readnotification/{id}', [Admin::class, 'readnotification']);
    Route::any('/admin/readallnotifications', [Admin::class, 'readallnotifications']);

    // gallery
    Route::any('/admin/gallery/{id?}', [Admin::class, 'gallery']);
    Route::any('/admin/getgallerydata/{id}', [Admin::class, 'getgallerydata']);
    Route::any('/admin/galleryupdate', [Admin::class, 'galleryupdate']);

    //slider 
    Route::any('/admin/slider/{id?}', [Admin::class, 'slider']);
    Route::any('/admin/getsliderdata/{id}', [Admin::class, 'getsliderdata']);
    Route::any('/admin/sliderupdate', [Admin::class, 'sliderupdate']);

    // category
    Route::any('/admin/category/{id?}', [Admin::class, 'category']);
    Route::any('/admin/getcateorydata/{id}', [Admin::class, 'getcateorydata']);
    Route::any('/admin/categoryupdate', [Admin::class, 'categoryupdate']);
    Route::any('/admin/deletecategorydata', [Admin::class, 'deletecategorydata']);
    Route::any('/admin/deleteallcategorydata', [Admin::class, 'deleteallcategorydata']);

    // page
    Route::any('/admin/page/{id?}', [PageController::class, 'page']);
    Route::any('/admin/addupdatepage/{id?}', [PageController::class, 'addupdatepage']);
    Route::any('/admin/getsubcategories/{id}', [PageController::class, 'getsubcategories']);
    Route::any('/admin/pageajaxdata/', [PageController::class, 'pageajaxdata']);
    Route::any('/admin/pagestatus', [PageController::class, 'pagestatus']);

    //blog
    Route::any('/admin/blogcategory/{id?}', [BlogController::class, 'blogcategory']);
    Route::any('/admin/blog/{id?}', [BlogController::class, 'blog']);
    Route::any('/admin/addupdateblog/{id?}', [BlogController::class, 'addupdateblog']);
    Route::any('/admin/blogajaxdata/', [BlogController::class, 'blogajaxdata']);
    Route::any('/admin/blogstatus', [BlogController::class, 'blogstatus']);
    Route::any('/admin/comment/{id?}', [BlogController::class, 'comment']);
    Route::any('/admin/commentajaxdata/{id?}', [BlogController::class, 'commentajaxdata']);
    Route::any('/admin/blogcommentstatus', [BlogController::class, 'blogcommentstatus']);

    //event
    Route::any('/admin/events/{id?}', [EventController::class, 'events']);
    Route::any('/admin/addupdateevent/{id?}', [EventController::class, 'addupdateevent']);
    Route::any('/admin/eventajaxdata/', [EventController::class, 'eventajaxdata']);
    Route::any('/admin/eventstatus', [EventController::class, 'eventstatus']);

    // page-blog-event section & content remove
    Route::any('/admin/deletesection/{id}', [Admin::class, 'deletesection']);
    Route::any('/admin/deletecontent/{id}', [Admin::class, 'deletecontent']);
    Route::any('/admin/deletepagedata', [Admin::class, 'deletepagedata']);
    Route::any('/admin/deleteallpagedata', [Admin::class, 'deleteallpagedata']);

    // testimonials
    Route::any('/admin/testimonials/{id?}', [Admin::class, 'testimonials']);
    Route::any('/admin/gettestimonialdata/{id}', [Admin::class, 'gettestimonialdata']);
    Route::any('/admin/testimonialsupdate', [Admin::class, 'testimonialsupdate']);

    // country
    Route::any('/admin/country/{id?}', [Admin::class, 'country']);
    Route::any('/admin/countryajaxdata', [Admin::class, 'countryajaxdata']);

    // state
    Route::any('/admin/state/{id?}', [Admin::class, 'state']);
    Route::any('/admin/stateajaxdata', [Admin::class, 'stateajaxdata']);

    //city
    Route::any('/admin/city/{id?}', [Admin::class, 'city']);
    Route::any('/admin/cityajaxdata', [Admin::class, 'cityajaxdata']);
    Route::any('/admin/getstates/{id}', [Admin::class, 'getstates']);

    // subscribe
    Route::any('/admin/subscribe/{id?}', [Admin::class, 'subscribe']);
    Route::any('/admin/subscribeajaxdata', [Admin::class, 'subscribeajaxdata']);

    // emailmarketing
    Route::any('/admin/emailmarketing', [Admin::class, 'emailmarketing']);
    Route::any('/admin/emailmarketingcampaign', [Admin::class, 'emailmarketingcampaign']);

    // General Setting
    Route::any('/admin/websetting/{id?}', [Admin::class, 'websetting']);
    Route::any('/admin/userheader', [Admin::class, 'userheader']);
    Route::any('/admin/userfooter', [Admin::class, 'userfooter']);
    Route::any('/admin/socialmedia/{id?}', [Admin::class, 'socialmedia']);
    Route::any('/admin/emailtemplate/{id?}', [Admin::class, 'emailtemplate']);
    Route::any('/admin/deleteemailattachment/{id}', [Admin::class, 'deleteemailattachment']);
    Route::any('/admin/deletecontactinfo/{id}', [Admin::class, 'deletecontactinfo']);
    Route::any('/admin/deleteemailinfo/{id}', [Admin::class, 'deleteemailinfo']);

    //SEO
    Route::any('/admin/sitemap', [Admin::class, 'sitemap']);
    Route::any('/admin/robots', [Admin::class, 'robots']);
    Route::any('/admin/generatexml', [Admin::class, 'generatexml']);

    Route::any('/admin/deletedata', [Admin::class, 'deletedata']);
    Route::any('/admin/deletealldata', [Admin::class, 'deletealldata']);

    Route::any('/admin/faq/{id?}', [Admin::class, 'faq']);

    // fetchAndStore locations
    Route::any('/admin/fetchAndStoreCountries', [Admin::class, 'fetchAndStoreCountries']);
    Route::any('/admin/fetchAndStoreStates', [Admin::class, 'fetchAndStoreStates']);
    Route::any('/admin/fetchAndStoreCities', [Admin::class, 'fetchAndStoreCities']);
});

Route::get('/pay/{store}', [PaymentController::class, 'showPaymentForm']);
Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession'])->middleware('throttle:60,1');
Route::get('/payment-success', [PaymentController::class, 'success']);
Route::get('/payment-cancel', [PaymentController::class, 'cancel']);
Route::post('/stripe/webhook', [PaymentController::class, 'webhook'])->middleware('throttle:60,1');

Route::post('/paypal-capture', [PaymentController::class, 'capturePaypal'])->middleware('throttle:60,1');
Route::get('/paypal-success/{token}', [PaymentController::class, 'paypalSuccess']);
Route::get('/payment-cancel', [PaymentController::class, 'paypalcancel']);

// User panel
Route::any('/{url?}/{id?}', [User::class, 'index'])->middleware('throttle:200,1');