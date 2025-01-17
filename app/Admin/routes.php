<?php

use App\Admin\Controllers\CustomiseController;
use App\Http\Controllers\PayNowController;
use App\Http\Controllers\ProductReviewController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->get('/customise', 'CustomiseController@index');
    $router->post('/add-product-fields', [CustomiseController::class, 'submitForm'])->name('add-product-fields');
    $router->post('/change-order-status', [CustomiseController::class, 'changeOrderStatus'])->name('change-order-status');
    $router->get('/download-invoice/{order_id}', [ProductReviewController::class, 'downInvoiceAsPDF']);
    $router->get('/download-receipt/{order_id}', [ProductReviewController::class, 'downReceiptAsPDF']);
    $router->get('/check-payment/{id}', [PayNowController::class, 'checkPaymentAdmin']);
    $router->resource('products', ProductsController::class);
    $router->resource('orders', OrdersController::class);
    $router->resource('sliders', SlidersController::class);
    $router->resource('transactions', TransactionsController::class);
    $router->resource('subscriptions', SubscriptionsController::class);
    $router->resource('product-reviews', ProductReviewsController::class);
    $router->resource('contact-forms', ContactFormsController::class);
    $router->resource('customers', CustomersController::class);
    $router->resource('banking-details', BankingDetailsController::class);
    $router->resource('shop-availabilities', ShopAvailabilityController::class);
    $router->resource('shipping-addresses', ShippingAddressController::class);
    $router->resource('product-stocks', ProductStocksController::class);
    $router->resource('stock-histories', StockHistoryController::class);
    $router->resource('branches', BranchesController::class);
});
