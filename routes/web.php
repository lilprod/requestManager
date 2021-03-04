<?php

use Illuminate\Support\Facades\Route;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::name('admin.')->group(function () {

    Route::group(['prefix' => 'admin'], function () {  

        Route::resource('operators', 'OperatorController');

        Route::resource('partners', 'PartnerController');

        Route::resource('ressources', 'RessourceController');

        Route::resource('typecomplaints', 'TypeComplaintController');

        Route::resource('complaints', 'ComplaintController');

        Route::resource('admins', 'AdminController');

        Route::resource('roles', 'RoleController');

        Route::resource('permissions', 'PermissionController');

    });
});

Route::resource('profils', 'ProfilController');

Route::post('/updatepassword', 'ProfilController@updatePassword')->name('updatepassword');

/*Route::get('/create_role_permission', function () {
    $role = Role::create(['name' => 'Admin']);
    $permission = Permission::create(['name' => 'Admin Permissions']);
    auth()->user()->assignRole('Admin');
    auth()->user()->givePermissionTo('Admin Permissions');  
});*/