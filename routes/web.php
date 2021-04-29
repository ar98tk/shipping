<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/unauthorized', [App\Http\Controllers\HomeController::class, 'authorized'])->name('authorized');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){

    Route::get('/', function () {return view('statistics');})->name('admin.statistics');

    Route::resource('drivers', 'App\Http\Controllers\DriverController');
    Route::put('/drivers/updateStatus/{driver}', [App\Http\Controllers\DriverController::class, 'updateStatus'])->name('drivers.status');

    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::put('/users/updateStatus/{user}', [App\Http\Controllers\UserController::class, 'updateStatus'])->name('users.status');

    Route::resource('discounts', 'App\Http\Controllers\DiscountController');
    Route::put('/discounts/updateStatus/{discount}', [App\Http\Controllers\DiscountController::class, 'updateStatus'])->name('discounts.status');

    Route::resource('trucks', 'App\Http\Controllers\TrucksTypesController');
    Route::put('/trucks/updateStatus/{truck}', [App\Http\Controllers\TrucksTypesController::class, 'updateStatus'])->name('trucks.status');

    Route::resource('phones', 'App\Http\Controllers\PhonesController');
    Route::put('/phones/updateStatus/{phone}', [App\Http\Controllers\PhonesController::class, 'updateStatus'])->name('phones.status');

    Route::resource('emails', 'App\Http\Controllers\EmailsController');
    Route::put('/emails/updateStatus/{email}', [App\Http\Controllers\EmailsController::class, 'updateStatus'])->name('emails.status');

    Route::resource('payments', 'App\Http\Controllers\PaymentsController');
    Route::put('/payments/updateStatus/{payment}', [App\Http\Controllers\PaymentsController::class, 'updateStatus'])->name('payments.status');

    Route::resource('companies', 'App\Http\Controllers\CompanyController');
    Route::put('/companies/updateStatus/{companies}', [App\Http\Controllers\CompanyController::class, 'updateStatus'])->name('companies.status');

    Route::resource('orders', 'App\Http\Controllers\OrderController');
    Route::put('/orders/updateStatus/{order}', [App\Http\Controllers\OrderController::class, 'updateStatus'])->name('orders.status');

    Route::resource('admins', 'App\Http\Controllers\AdminController');
    Route::put('/admins/updateStatus/{order}', [App\Http\Controllers\AdminController::class, 'updateStatus'])->name('admins.status');


    Route::put('/contacts/updateStatus/{contact}', [App\Http\Controllers\ContactsController::class, 'updateStatus'])->name('contacts.status');
    Route::get('/contacts/drivers',[App\Http\Controllers\ContactsController::class, 'indexDriver'])->name('contacts.indexDriver');
    Route::get('/contacts/users',[App\Http\Controllers\ContactsController::class, 'index'])->name('contacts.index');

    Route::resource('contacts_types', 'App\Http\Controllers\ContactsTypesController');
    Route::resource('goods', 'App\Http\Controllers\GoodsController');
    Route::resource('prices', 'App\Http\Controllers\PricesController');
    Route::resource('bank_accounts', 'App\Http\Controllers\BankAccountsController');
    Route::resource('financials', 'App\Http\Controllers\FinancialController');


});

Route::group(['prefix'=>'company','middleware'=>'company'],function (){

    Route::get('/orders', [App\Http\Controllers\Company\OrderController::class, 'index'])->name('company.orders.index');
    Route::get('/drivers', [App\Http\Controllers\Company\DriverController::class, 'index'])->name('company.drivers.index');
    Route::get('/drivers/{driver}/edit', [App\Http\Controllers\Company\DriverController::class, 'edit'])->name('company.drivers.edit');
    //Route::get('/drivers{driver}/edit', [App\Http\Controllers\Company\DriverController::class, 'edit'])->name('company.drivers.edit');
    Route::get('/financials', [App\Http\Controllers\Company\FinancialController::class, 'index'])->name('company.financials.index');
    Route::get('/financials/{financial}/edit', [App\Http\Controllers\Company\FinancialController::class, 'edit'])->name('company.financials.edit');
    Route::put('/financials/update/{financial}', [App\Http\Controllers\Company\FinancialController::class, 'update'])->name('company.financials.update');
    Route::put('/drivers/update/{driver}', [App\Http\Controllers\Company\DriverController::class, 'update'])->name('company.drivers.update');
    Route::post('/drivers', [App\Http\Controllers\Company\DriverController::class, 'store'])->name('company.drivers.store');
    Route::put('/drivers/updateStatusDriver/{driver}', [App\Http\Controllers\Company\DriverController::class, 'updateStatus'])->name('company.drivers.status');
    Route::get('/', function () {return view('company.statistics');})->name('company.statistics');

});
