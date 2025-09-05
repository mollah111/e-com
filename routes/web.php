<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index']);
Route::get('/product-details/{slug}', [FrontendController::class, 'productDetails']);
Route::get('/shop', [FrontendController::class, 'shop']);
Route::get('/return-process', [FrontendController::class, 'returnProcess']);
Route::get('/category-products/{id}', [FrontendController::class, 'categoryProducts']);
Route::get('/subcategory-products/{id}', [FrontendController::class, 'subcategoryProducts']);
Route::get('/view-cart', [FrontendController::class, 'viewCart']);
Route::get('/checkout', [FrontendController::class, 'checkOut']);
Route::get('/type-products/{type}', [FrontendController::class, 'typeProducts']);


// Policy page...

Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy']);
Route::get('/terms-conditions', [FrontendController::class, 'termsConditions']);
Route::get('/refund-policy', [FrontendController::class, 'refundPolicy']);
Route::get('/payment-policy', [FrontendController::class, 'paymentPolicy']);
Route::get('/about-us', [FrontendController::class, 'aboutUs']);
Route::get('/contact-us', [FrontendController::class, 'contactUs']);

//Cart Routes...
Route::get('/add-to-cart/{id}', [FrontendController::class, 'addToCart']);
Route::post('/add-to-cart-details/{id}', [FrontendController::class, 'addToCartDetails']);
Route::get('/cart-delete/{id}', [FrontendController::class, 'addToCartDelete']);

//Order Confirmation Routes...
Route::post('/confirm-order', [FrontendController::class, 'confirmOrder']);
Route::get('/order-confirmed/{invoiceId}', [FrontendController::class, 'thankyou']);

//Admin Login...
Route::get('/admin/login', [AdminController::class, 'adminLogin']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard']);
Route::get('/admin/logout', [AdminController::class, 'adminLogout']);

//Categories...
Route::get('/admin/category/list', [CategoryController::class, 'categoryList']);
Route::get('/admin/category/create', [CategoryController::class, 'categoryCreate']);
Route::post('/admin/category/store', [CategoryController::class, 'categoryStore']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'categoryDelete']);
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'categoryEdit']);
Route::post('/admin/category/update/{id}', [CategoryController::class, 'categoryUpdate']);

//SubCategories...
Route::get('/admin/sub-category/list', [SubCategoryController::class, 'subCategoryList']);
Route::get('/admin/sub-category/create', [SubCategoryController::class, 'subCategoryCreate']);
Route::post('/admin/sub-category/store', [SubCategoryController::class, 'subCategoryStore']);
Route::get('/admin/sub-category/edit/{id}', [SubCategoryController::class, 'subCategoryEdit']);
Route::post('/admin/sub-category/update/{id}', [SubCategoryController::class, 'subCategoryUpdate']);
Route::get('/admin/sub-category/delete/{id}', [SubCategoryController::class, 'subCategoryDelete']);

//Products...
Route::get('/admin/product/list', [ProductController::class, 'productList']);
Route::get('/admin/product/create', [ProductController::class, 'productCreate']);
Route::post('/admin/product/store', [ProductController::class, 'productStore']);
Route::get('/admin/product/edit/{id}', [ProductController::class, 'productEdit']);
Route::post('/admin/product/update/{id}', [ProductController::class, 'productUpdate']);
Route::get('/admin/product/delete/{id}', [ProductController::class, 'productDelete']);