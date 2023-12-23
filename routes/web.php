<?php

use App\Models\Item;
use App\Models\Shipment;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\UomController;
use App\Http\Controllers\Backend\ItemController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ShipmentController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\ContainerController;
use App\Http\Controllers\Backend\DepartementController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// jika ingin membuat sebuah controller cari kata kuncinya minimal dua seperti admin dan logout
Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');

    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');
}); // End User Middleware 

Route::controller(ContainerController::class)->group(function () {

    Route::get('/all/container', 'AllContainer')->name('all.container');
    Route::get('/add/container', 'AddContainer')->name('add.container');
    Route::post('/store/container', 'StoreContainer')->name('container.store');
    Route::get('/edit/container/{id}', 'EditContainer')->name('edit.container');
    Route::post('/update/container', 'UpdateContainer')->name('update.container');
    Route::get('/delete/container/{id}', 'DeleteContainer')->name('delete.container');
});

Route::controller(UomController::class)->group(function () {

    Route::get('/all/uom', 'AllUom')->name('all.uom');
    Route::get('/add/uom', 'AddUom')->name('add.uom');
    Route::post('/store/uom', 'StoreUom')->name('uom.store');
    Route::get('/edit/uom/{id}', 'EditUom')->name('edit.uom');
    Route::post('/update/uom', 'UpdateUom')->name('update.uom');
    Route::get('/delete/uom/{id}', 'DeleteUom')->name('delete.uom');
});

Route::controller(DepartementController::class)->group(function () {

    Route::get('/all/departement', 'AllDepartement')->name('all.departement');
    Route::get('/add/departement', 'AddDepartement')->name('add.departement');
    Route::post('/store/departement', 'StoreDepartement')->name('store.departement');
    Route::get('/edit/departement/{id}', 'EditDepartement')->name('edit.departement');
    Route::post('/update/departement', 'UpdateDepartement')->name('update.departement');
    Route::get('/delete/departement/{id}', 'DeleteDepartement')->name('delete.departement');
});

Route::controller(SupplierController::class)->group(function () {

    Route::get('/all/supplier', 'AllSupplier')->name('all.supplier');
    Route::get('/add/supplier', 'AddSupplier')->name('add.supplier');
    Route::post('/store/supplier', 'StoreSupplier')->name('store.supplier');
    Route::get('/edit/supplier/{id}', 'EditSupplier')->name('edit.supplier');
    Route::post('/update/supplier', 'UpdateSupplier')->name('update.supplier');
    Route::get('/delete/supplier/{id}', 'DeleteSupplier')->name('delete.supplier');
});

Route::controller(ItemController::class)->group(function () {

    Route::get('/all/item', 'AllItem')->name('all.item');
    Route::get('/add/item', 'AddItem')->name('add.item');
    Route::post('/store/item', 'StoreItem')->name('item.store');
    Route::get('/edit/item/{id}', 'EditItem')->name('edit.item');
    Route::post('/update/item', 'UpdateItem')->name('update.item');
    Route::get('/delete/item/{id}', 'DeleteItem')->name('delete.item');
});


Route::controller(ShipmentController::class)->group(function () {

    Route::get('/all/shipment', 'AllShipment')->name('all.shipment');
    Route::get('/add/shipment', 'AddShipment')->name('add.shipment');
    Route::post('/store/shipment', 'StoreShipment')->name('store.shipment');
    Route::get('/send/shipment/{id}', 'SendShipment')->name('send.shipment');
    Route::post('/update/status', 'UpdateStatus')->name('update.status.shipment');
});

Route::controller(UserController::class)->group(function () {

    Route::get('/all/user', 'AllUser')->name('all.user');
    Route::get('/add/user', 'AddUser')->name('add.user');
    Route::post('/store/user', 'StoreUser')->name('store.user');
    Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
});
