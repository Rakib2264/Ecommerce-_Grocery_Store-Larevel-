<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\AddtoCartController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get("/",[FrontendController::class,"index"])->name("frontend");
Route::get("/category/product/{slug}",[FrontendController::class,"category_product"])->name("category_product");
Route::get("/Subcategory/product/{slug}",[FrontendController::class,"subcategory_product"])->name("subcategory_product");
Route::get("/single/product/{slug}",[FrontendController::class,"single_product"])->name("single_product");
Route::post("/addtocart",[AddtoCartController::class,"addtocart"])->name("addtocart");
Route::post("/cardproductqty/{id}",[FrontendController::class,"cardproductqty"])->name("cardproductqty");
Route::get("/peoduct_delete_form_cart/{id}",[FrontendController::class,"peoduct_delete_form_cart"])->name("peoduct_delete_form_cart");
Route::post("/confirm_order",[FrontendController::class,"confirm_order"])->name("confirm_order");

Route::middleware(['auth', 'role:user'])->group(function () {
     Route::get("/checkout",[FrontendController::class,"checkout"])->name("checkout");
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get("/invoice_print/{id}",[AdminController::class,"invoice_print"])->name("invoice_print");

    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/add', [CategoryController::class, 'add'])->name('category.add');
        Route::get('/manage', [CategoryController::class, 'manage'])->name('category.manage');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });

    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/add', [SubCategoryController::class, 'add'])->name('subcategory.add');
        Route::get('/manage', [SubCategoryController::class, 'manage'])->name('subcategory.manage');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
        Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
    });

    Route::group(['prefix' => 'brand'], function () {
        Route::get('/add', [BrandController::class, 'add'])->name('brand.add');
        Route::get('/manage', [BrandController::class, 'manage'])->name('brand.manage');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/add', [ProductController::class, 'add'])->name('product.add');
        Route::get('/manage', [ProductController::class, 'manage'])->name('product.manage');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });

});


require __DIR__.'/auth.php';
