<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\User;
use App\Notifications\MountNotifucation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;




require __DIR__ . '/auth.php';

Route::get('note', function () {


    Notification::send(User::all(), new MountNotifucation(Product::find(1)));
});


Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->middleware(['verified'])->name('dashboard');



    Route::resource('unite', UniteController::class);

    Route::get('delete/{id}', [UniteController::class, 'delete']);

    //------products--------------------

    Route::group(['prefix' => 'product', 'controller' => ProductController::class], function () {
        Route::get('/', 'index');
        Route::post('store_product', 'store_product');
        Route::post('update_product', 'update_product');
        Route::post('product_delete', 'product_delete');
    });
    //---------report invoices--------------------


    //--------------sections--------------

    Route::group(['prefix' => 'section', 'controller' => SectionController::class], function () {
        Route::get('/', 'index');
        Route::post('store_section', 'store_section');
        Route::post('update_section', 'update_section');
        Route::delete('delete_section', 'delete_section');
    });
    //--------------roles--------

    Route::group(['prefix' => 'user', 'controller' => UserController::class], function () {



        Route::get('/', 'index');
        Route::get('Add_user', 'Add_user');
        Route::post('store_user', 'store_user');
        Route::get('delete_user/{id}', 'delete_user');
        Route::get('edit_user/{id}', 'edit_user');
        Route::post('update_user', 'update_user');    //------------------notification------------------
        Route::get('mark_all_read', 'mark_all_read');
    });
    Route::view('cashier', 'cashier.cashier')->name('cashier');
    Route::post('cashier/store_order', [CashierController::class, 'store_order']);
    Route::get('gete_product/{section_id}', [CashierController::class, 'get_products']);
    Route::get('get_price/{product}', [CashierController::class, 'get_price']);


    Route::resource('order', OrderController::class);
    Route::get('order/delete/{id}', [OrderController::class, 'delete']);

    Route::get('arshefed', [OrderController::class, 'arshefed']);

    Route::get('make_report', [ReportController::class, 'index']);

    Route::post('report', [ReportController::class, 'report']);

    Route::get('force_deleted/{id}', [OrderController::class, 'force_deleted']);
    Route::get('restore/{id}', [OrderController::class, 'restore']);
    Route::get('restore/{id}', [OrderController::class, 'restore']);
    Route::get('force_deleted_all', [OrderController::class, 'force_deleted_all']);
    Route::get('delete_all', [OrderController::class, 'delete_all']);
});
