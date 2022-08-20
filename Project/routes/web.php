<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\UserController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\Frontend\MailController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\CommandController;

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SliderController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*===========================================
Frontend Routes
===========================================*/

// HomePage Route
Route::get('/',[HomeController::class, 'index']); 

//About Route
Route::get('/about', function() {
    return view('frontend.pages.about.index');
});

//Contact Route
Route::get('/contact', function() {
    return view('frontend.pages.contact.index');
});

//Shop Checkout Route
Route::get('/shop-checkout', function() {
    return view('frontend.pages.shop-checkout.index');
});

/// Product Search Route 
Route::any('/search', [HomeController::class, 'ProductSearch'])->name('product.search');


//Shop Wishlist
Route::get('/shop-wishlist', function() {
    return view('frontend.pages.shop-wishlist.index');
});

//Shop All Products Route
Route::get('/shop-product-category', function() {
    return view('frontend.pages.shop-product-list.index');
});


//Shop Single Product Route
Route::get('/shop-product-detail', function() {
    return view('frontend.pages.shop-product-detail.index');
});

//Shop Single Product Route
Route::get('/shop-service-detail', function() {
    return view('frontend.pages.shop-service-detail.index');
});

// ****  CART ROUTES ****

// add to cart store Data
Route::post('/cart/data/store/{id}',[CartController::class, 'AddToCart']); 

// product view mini cart AJAX
Route::get('/product/mini/cart/',[CartController::class, 'MiniCart']); 

// product remove mini cart AJAX
Route::get('/minicart/product-remove/{rowId}',[CartController::class, 'RemoveMiniCart']); 

Route::get('/shop-cart', [CartController::class, 'CartView'])->name('shop_cart');



// ****  WISHLIST ROUTES ****

// product add-to-wishlist AJAX
Route::post('/add-to-wishlist/{product_id}',[WishlistController::class, 'AddToWishlist']); 

// ****  COMMENT ROUTES **** //
Route::post('/review/store', [CommentController::class, 'ReviewStore'])->name('review.store');

//user routes
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        // Wishlist view Route
        Route::get('/wishlist', [WishlistController::class, 'wishlistView'])->name('wishlist');

        // view product to wishlist AJAX
        Route::get('/get-wishlist-product',[WishlistController::class, 'GetWishlistProduct']);

        // count product to wishlist AJAX
        Route::get('/get-wishlist-count',[WishlistController::class, 'GetWishlistcount']);

        // remove product to wishlist AJAX
        Route::get('/remove-wishlist-product/{rowId}',[WishlistController::class, 'DeleteWishlistProduct']);
            
        // stripe order
        Route::post('/stripe/order',[StripeController::class, 'StripeOrder'])->name('stripe.order'); 
   });
});
// Route::get('/get-wishlist-count',[WishlistController::class, 'GetWishlistcount']);

// **** CHECKOUT ROUTES ****

    // checkout view Route
    Route::get('/checkout', [CheckoutController::class, 'checkoutView'])->name('checkout');

    // checkout store Route
   Route::post('/checkout/store', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');



// **** PRODUCTS ROUTES ****

// Product detail Routes
Route::get('/product/details/{id}/{slug}',[HomeController::class, 'ProductDetails']); 

// Product categories Routes
Route::get('/product/categories/{id}/{slug}',[HomeController::class, 'ProductCategories']); 

// Product subcategories Routes
Route::get('/product/subcategories/{id}/{slug}',[HomeController::class, 'ProductSubSubCategories']); 

// product view ajax modal
Route::get('/product/view/modal/{id}',[HomeController::class, 'ProductViewAjax']); 


// service detail Routes
Route::get('/service/details/{id}/{slug}',[HomeController::class, 'serviceDetails']); 

// **** COMMAND ROUTES ****

// service add-to-command AJAX
Route::post('/add-to-command-service/{service_id}',[CommandController::class, 'AddToCommandservice']); 

// product add-to-command AJAX
Route::post('/add-to-command-product/{product_id}',[CommandController::class, 'AddToCommandproduct']); 


/*===========================================
Auth Routes
===========================================*/

//User Auth Route
Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
       Route::view('/login','auth.login')->name('login');
       Route::view('/register','auth.register')->name('register');
       Route::post('/create',[UserController::class,'create'])->name('create');
       Route::post('/check',[UserController::class,'check'])->name('check');
 
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/dashboard','frontend.pages.home.index')->name('home');
        Route::get('/profile',[UserController::class, 'UserProfile'])->name('profile');
        Route::get('/logout',[UserController::class,'logout'])->name('logout');
    });

});

//Admin Auth Route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
       Route::view('/login','auth.admin_login')->name('login');
       Route::view('/register','admin.register')->name('register');
       Route::post('/create',[AdminController::class,'create'])->name('create');
       Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/dashboard','admin.pages.home.index')->name('dashboard.home')->middleware('auth:admin'); 
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::get('/profile',[AdminController::class,'profile'])->name('profile');
        Route::get('/profile/edit',[AdminController::class,'editprofile'])->name('profile_edit');
        Route::post('/profile/store',[AdminController::class,'storeprofile'])->name('profile_store');
    });
    
});

/*===========================================
Backend Routes
===========================================*/

//PROTECT DASHBOARD ACCESS

Route::group(['middleware' => ['auth:admin', 'PreventBackHistory']], function() {

    // Brand Routes
    Route::prefix('brand')->group(function(){
        Route::get('/view',[BrandController::class, 'BrandView'])->name('all.brand');
        Route::post('/store',[BrandController::class, 'BrandStore'])->name('brand.store');
        Route::get('/edit/{id}',[BrandController::class, 'BrandEdit'])->name('brand.edit');
        Route::post('/update',[BrandController::class, 'BrandUpdate'])->name('brand.update');
        Route::get('/delete/{id}',[BrandController::class, 'BrandDelete'])->name('brand.delete');
    });

    // Categories Routes
    Route::prefix('category')->group(function(){
        Route::get('/view',[CategoryController::class, 'ctrCategoryView'])->name('all.category');
        Route::post('/store',[CategoryController::class, 'ctrCategoryStore'])->name('category.store');
        Route::get('/edit/{id}',[CategoryController::class, 'ctrCategoryEdit'])->name('category.edit');
        Route::post('/update',[CategoryController::class, 'ctrCategoryUpdate'])->name('category.update');
        Route::get('/delete/{id}',[CategoryController::class, 'ctrCategoryDelete'])->name('category.delete');

        // SubCategories Routes
        Route::get('/sub/view',[SubCategoryController::class, 'ctrSubCategoryView'])->name('all.subcategory');
        Route::post('/sub/store',[SubCategoryController::class, 'ctrSubCategoryStore'])->name('subcategory.store');
        Route::get('/sub/edit/{id}',[SubCategoryController::class, 'ctrSubCategoryEdit'])->name('subcategory.edit');
        Route::post('/sub/update',[SubCategoryController::class, 'ctrSubCategoryUpdate'])->name('subcategory.update');
        Route::get('/sub/delete/{id}',[SubCategoryController::class, 'ctrSubCategoryDelete'])->name('subcategory.delete');

        // SubSubCategories Routes
        Route::get('/sub/sub/view',[SubCategoryController::class, 'ctrSubSubCategoryView'])->name('all.subsubcategory');
        Route::post('/sub/sub/store',[SubCategoryController::class, 'ctrSubSubCategoryStore'])->name('subsubcategory.store');
        Route::get('/sub/sub/edit/{subsubcat_id}',[SubCategoryController::class, 'ctrSubSubCategoryEdit'])->name('subsubcategory.edit');
        Route::post('/sub/sub/update',[SubCategoryController::class, 'ctrSubSubCategoryUpdate'])->name('subsubcategory.update');
        Route::get('/sub/sub/delete/{subsubcat_id}',[SubCategoryController::class, 'ctrSubSubCategoryDelete'])->name('subsubcategory.delete');

        // Ajax Request 
        Route::get('/subcategories/ajax/{category_id}',[SubCategoryController::class, 'ctrGetSubCategoryView']);
        Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'ctrGetSubSubCategory']);

    });

    // Products Routes
    Route::prefix('product')->group(function() {

        // Add Products
        Route::get('/add', [ProductController::class, 'ctrAddProductView'])->name('add.product.view');
        Route::post('/store', [ProductController::class, 'ctrStoreProduct'])->name('add.product.store');

        // All Products
        Route::get('/all', [ProductController::class, 'ctrViewAllProducts'])->name('view.all.products');
        Route::get('/delete/{product_id}', [ProductController::class, 'ctrProductDelete'])->name('product.delete');
        Route::get('/edit/{id}', [ProductController::class, 'ctrEditProduct'])->name('product.edit');
        // Active & InActive Product
        Route::get('/active/{item_id}', [ProductController::class, 'ctrProductActive'])->name('product.active');
        Route::get('/inactive/{item_id}', [ProductController::class, 'ctrProductInactive'])->name('product.inactive');

    });

        // Products Routes
        Route::prefix('service')->group(function() {

            // Add services
            Route::get('/add', [ServiceController::class, 'ctrAddserviceView'])->name('add.service.view');
            Route::post('/store', [ServiceController::class, 'ctrStoreservice'])->name('add.service.store');
    
            // All services
            Route::get('/all', [ServiceController::class, 'ctrViewAllservices'])->name('view.all.services');
            Route::get('/delete/{service_id}', [ServiceController::class, 'ctrserviceDelete'])->name('service.delete');
            Route::get('/edit/{id}', [ServiceController::class, 'ctrEditservice'])->name('service.edit');
            // Active & InActive service
            Route::get('/active/{item_id}', [ServiceController::class, 'ctrserviceActive'])->name('service.active');
            Route::get('/inactive/{item_id}', [ServiceController::class, 'ctrserviceInactive'])->name('service.inactive');
    
        });

    // Slider Routes
    Route::prefix('slider')->group(function() {

        // Principal Slider
        Route::get('/principal/view', [SliderController::class, 'ctrSliderPrincipalView'])->name('principal.slider.view');
        Route::post('/principal/store', [SliderController::class, 'ctrSliderStore'])->name('slider.store');
        Route::get('/principal/edit/{slider_id}', [SliderController::class, 'ctrSliderEdit'])->name('slider.edit');
        Route::post('/principal/update', [SliderController::class, 'ctrSliderUpdate'])->name('slider.update');
        Route::get('/principal/delete/{slider_id}', [SliderController::class, 'ctrSliderDelete'])->name('slider.delete');

        // Active & InActive Slider
        Route::get('/active/{slider_id}', [SliderController::class, 'SliderActive'])->name('slider.active');
        Route::get('/inactive/{slider_id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
        
    });

});


// CkEditor Upload Image Route
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:admin','PreventBackHistory']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

/// Multi Language All Routes ////

Route::get('/language/french', [LanguageController::class, 'French'])->name('french.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');

Route::get('/send-email', [MailController::class, 'SendEmail']);