<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\DeliveryBoy\DeliveryBoyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('signUp',[AuthenticationController::class,'register'])->name('signUp');
Route::post('register',[AuthenticationController::class,'signUp'])->name('sign-up');
Route::get('signIn',[AuthenticationController::class,'login'])->name('login');
Route::post('login',[AuthenticationController::class,'signIn'])->name('sign-in');
Route::post('logout',[AuthenticationController::class,'logout'])->name('logout');
Route::get('language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');
Route::get('forgot-password',[AuthenticationController::class,'forgotPassword'])->name('forgot-password.form');
Route::post('forgot-password',[AuthenticationController::class,'sendResetLink'])->name('forgot-password');
Route::get('reset-password/{token}',[AuthenticationController::class,'showResetForm'])->name('password.reset');
Route::post('reset-password',[AuthenticationController::class,'resetPassword'])->name('password.update');
Route::view('reset-password','reset-password');
Route::put('profile', [AuthenticationController::class,'updateProfile'])->name('profile.update');

Route::get('lang/{locale}', function ($locale) {

    if (! in_array($locale, ['en', 'hi'])) {
        abort(400);
    }

    session(['locale' => $locale]);

    return redirect()->back();
});


Route::prefix('customer')->middleware(['auth', 'customer', 'locale'])->group(function () {
    Route::get('index', [CustomerController::class,'index'])->name('customer.index');
    Route::get('category/{id}',[CustomerController::class,'subcategory'])->name('customer.category');
    //Route::get('/get-products/{id}', [CustomerController::class, 'getProducts'])->name('customer.getProducts');
    Route::get('get-products', [CustomerController::class, 'getProducts'])->name('customer.getProducts');
    Route::get('shop/{id}',[CustomerController::class,'show'])->name('shop.show');
    Route::get('filterName',[CustomerController::class,'filterName'])->name('filter.name');
    Route::get('filterPrice',[CustomerController::class,'filterPrice'])->name('filter.price');
    Route::post('wishlist/{id}',[CustomerController::class,'wishlist'])->name('customer.wishlist');
    Route::post('/customer/wishlist/{id}', [CustomerController::class, 'store'])->name('customer.wishliststore');
    Route::get('showWishlist',[CustomerController::class,'showWishlist'])->name('customer.showWishlist');
    Route::delete('deleteWishlist/{id}',[CustomerController::class,'deleteWishlist'])->name('customer.removeWishlist');
    Route::post('cart/{id}',[CustomerController::class,'cart'])->name('customer.cart');
    Route::get('showCart',[CustomerController::class,'showCart'])->name('customer.showCart');
    Route::post('update-quantity', [CustomerController::class, 'updateQuantity'])->name('customer.updateQuantity');
    Route::delete('deleteCart/{id}',[CustomerController::class,'deleteCart'])->name('customer.removeCart');
    Route::get('checkout',[CustomerController::class,'checkout'])->name('customer.checkout');
    Route::post('placeOrder',[CustomerController::class,'placeOrder'])->name('customer.placeorder');
    Route::post('/razorpay/verify', [CustomerController::class, 'verifyPayment'])->name('razorpay.verify');
    Route::get('myorder',[CustomerController::class,'myOrder'])->name('customer.myorder');
    Route::get('order-details/{id}',[CustomerController::class,'orderDetails'])->name('customer.order-details');
    Route::put('order-cancle/{id}',[CustomerController::class, 'cancelOrder'])->name('customer.order-cancel');
    Route::get('/invoice/{id}/download',[CustomerController::class, 'download'])->name('invoice.download');
    Route::get('/search-category', [CustomerController::class, 'searchCategory'])->name('customer.searchCategory');
    Route::get('about',[CustomerController::class,'aboutUs'])->name('customer.aboutus');
    Route::get('contact', [CustomerController::class,'contact'])->name('customer.contact');
    
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('index',[AdminController::class,'index'])->name('admin.index');
    Route::get('customer',[AdminController::class,'customers'])->name('admin.customer');
    Route::get('vendor',[AdminController::class,'vendors'])->name('admin.vendor');
    Route::get('deliveryboy',[AdminController::class,'deliveryboys'])->name('admin.deliveryboy');
    Route::get('category',[CategoryController::class,'index'])->name('admin.category');
    Route::post('create',[CategoryController::class,'create'])->name('category.create');
    Route::get('add-category', [CategoryController::class,'category'])->name('category.add');
    Route::get('edit-category/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('update-category/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::delete('delete-category/{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::get('subcategory',[SubCategoryController::class,'index'])->name('admin.subcategory');
    Route::get('add-subcategory',[SubCategoryController::class,'subcategory'])->name('subcategory.add');
    Route::post('add-subcategory', [SubCategoryController::class,'create'])->name('subcategory.create');
    Route::get('edit-subcategory/{id}',[SubCategoryController::class,'edit'])->name('subcategory.edit');
    Route::put('update-subcategory/{id}',[SubCategoryController::class,'update'])->name('subcategory.update');
    Route::delete('delete-subcategory/{id}',[SubCategoryController::class,'delete'])->name('subcategory.delete');
    Route::get('customersearch',[AdminController::class,'search'])->name('customers.search');
    Route::get('vendorsearch',[AdminController::class,'vendorSearch'])->name('vendors.search');
    Route::get('deliveryboysearch',[AdminController::class,'deliveryboySearch'])->name('deliveryboys.search');
    Route::get('categorysearch',[CategoryController::class,'search'])->name('category.search');
    Route::get('subcategorysearch',[SubCategoryController::class,'search'])->name('subcategory.search');
    Route::get('order-list',[OrderController::class,'orders'])->name('order-list');
    Route::get('order-details/{id}',[OrderController::class,'orderDetails'])->name('admin.order-details');
    Route::get('order-cancel',[OrderController::class,'orderCancel'])->name('order-cancel');
    Route::get('order-delivered',[OrderController::class,'orderDelivered'])->name('order-delivered');

});

Route::prefix('vendor')->middleware(['auth', 'vendor'])->group(function (){
    Route::get('index', [VendorController::class,'index'])->name('vendor.index');
    Route::get('products',[ProductController::class,'index'])->name('vendor.product');
    Route::get('add-product',[ProductController::class,'products'])->name('product.add');
    Route::post('create-product',[ProductController::class,'create'])->name('product.create');
    Route::get('read-product',[ProductController::class,'read'])->name('product-read');
    Route::get('edit-product/{id}',[ProductController::class,'edit'])->name('product-edit');
    Route::get('view-product/{id}',[ProductController::class,'view'])->name('product-view');
    Route::put('update-product/{id}',[ProductController::class,'update'])->name('product.update');
    Route::delete('delete-product/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('product-search',[ProductController::class,'search'])->name('product.search');
    Route::get('order-list',[VendorController::class,'orders'])->name('vendor.order-list');
    Route::get('order-details/{id}',[VendorController::class,'orderDetails'])->name('vendor.order-detail');
    Route::put('update-order-status/{id}',[VendorController::class,'updateOrderStatus'])->name('vendor.update-order-status');
    Route::get('order-cancel',[VendorController::class,'orderCancel'])->name('vendor.order-cancel');
    Route::get('order-delivered',[VendorController::class,'orderDelivered'])->name('vendor.order-delivered');
    Route::get('add-discount',[ProductController::class,'product'])->name('discount.add');
    Route::post('create-discount',[ProductController::class,'createDiscount'])->name('discount.create');
    Route::get('read-discount',[ProductController::class,'showDiscount'])->name('discount-read');
    Route::get('edit-discount/{id}',[ProductController::class,'editDiscount'])->name('discount-edit');
    Route::put('update-discount/{id}',[ProductController::class,'updateDiscount'])->name('discount-update');
    Route::delete('delete-discount/{id}',[ProductController::class,'deleteDiscount'])->name('discount-delete');

}); 

Route::prefix('delivery_boy')->middleware(['auth', 'delivery_boy'])->group(function (){
    Route::get('index', [DeliveryBoyController::class,'index'])->name('deliveryboy.index');
    Route::get('assigend',[DeliveryBoyController::class,'assignedOrder'])->name('deliveryboy.assignedorder');
    Route::get('delivered',[DeliveryBoyController::class,'deliveredOrder'])->name('deliveryboy.deliveredorder');
    Route::get('order-details/{id}',[DeliveryBoyController::class,'orderDetails'])->name('deliveryboy.order-detail');
    Route::put('update-order-status/{id}',[DeliveryBoyController::class,'updateOrderStatus'])->name('deliveryboy.update-order-status');
});


//Yesterday, there was a holiday