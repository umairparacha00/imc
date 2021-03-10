<?php

	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Route;

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

	Route::middleware('guest')->group(function () {
		Route::get('/', 'IndexController@index');
		Route::get('/services', 'IndexController@services')->name('services');
		Route::get('/about_us', 'IndexController@about_us')->name('about_us');
		Route::get('/contact_us', 'IndexController@contact_us')->name('contact_us');
		Route::get('/pricing', 'IndexController@pricing')->name('pricing');
		Route::get('/terms', 'IndexController@terms_and_conditions')->name('terms_and_conditions');
		Route::get('/admin/login', 'Admin\AdminController@showLoginForm');
	});

	Auth::routes();
	Route::prefix('admin')->namespace('Admin')->group(function () {
		Route::post('/login', 'AdminController@login');
		Route::middleware('admin')->group(function () {
			Route::get('/dashboard', 'AdminController@showDashboard');
			Route::prefix('resources')->group(function () {
				Route::group(['middleware' => ['role:super-admin,admin']], function () {
					Route::resource('admins', 'AdminController');
					Route::resource('balances', 'BalanceController');
					Route::get('/admins/{admin}/assign-role', 'RolesController@showAssignRoleToAdminForm')->name('admins.assignRole.create');
					Route::post('/admins/assign-role', 'RolesController@assignRoleToAdmin')->name('admins.assignRole.post');
					Route::get('/admins/{admin}/give-permission', 'PermissionsController@showGivePermissionToAdminForm')->name('admins.givePermission.create');
					Route::post('/admins/give-permission', 'PermissionsController@givePermissionToAdmin')->name('admins.givePermission.post');
					Route::post('/getAdminDetailsForDestroying', 'AdminController@getAdminDetailsForDestroying');
					Route::get('/users/{user}/assign-role', 'RolesController@showAssignRoleToUsersForm')->name('users.assignRole.create');
					Route::post('/users/assign-role', 'RolesController@assignRoleToUsers')->name('users.assignRole.post');
					Route::get('/users/{user}/give-permission', 'PermissionsController@showGivePermissionToUsersForm')->name('users.givePermission.create');
					Route::post('/users/give-permission', 'PermissionsController@givePermissionToUsers')->name('users.givePermission.post');
				});
				Route::post('/getUserDetailsForDestroying', 'UserController@getUserDetailsForDestroying');
				Route::resource('users', 'UserController');
			});
			Route::resource('memberships', 'MembershipController');
			Route::post('/getMembershipDetailsForDestroying', 'MembershipController@getMembershipDetailsForDestroying');
			Route::get('/users/documents', 'documentsApprovingController@show')->name('users.documents');
			Route::put('/users/{user}/document/approve', 'documentsApprovingController@approve')->name('users.documents.approve');
			Route::put('/users/{user}/document/reject', 'documentsApprovingController@reject')->name('users.documents.reject');

			Route::group(['middleware' => ['role:super-admin,admin']], function () {
				Route::resource('roles', 'RolesController');
				Route::prefix('roles')->group(function () {
					Route::get('/{role}/assignPermission', 'RolesController@showAssignPermission')->name('roles.assignPermission.create');
					Route::post('/assignPermission', 'RolesController@AssignPermission')->name('roles.assignPermission.post');
				});
				Route::prefix('rates')->group(function () {
					Route::resource('rates', 'RatesController');
				});
				Route::post('/getRateDetailsForDestroying', 'RatesController@getRateDetailsForDestroying');
				Route::post('/getRoleDetailsForDestroying', 'RolesController@getRoleDetailsForDestroying');
				Route::post('/getPermissionDetailsForDestroying', 'PermissionsController@getPermissionDetailsForDestroying');
				Route::resource('permissions', 'PermissionsController');
				Route::prefix('permissions')->group(function () {
					Route::get('/{permission}/assignRole', 'PermissionsController@showAssignRole')->name('permissions.assignRole.create');
					Route::post('/assignRole', 'PermissionsController@AssignRole')->name('permissions.assignRole.post');
				});
				Route::get('/ranks/pending', 'RankController@index')->name('ranks.pending');
				Route::put('/ranks/pending/{rank}', 'RankController@update')->name('ranks.pending.update');
				Route::get('/transactions', 'TransactionController@index');
				Route::get('/create-points', 'TransactionsController@showPointsCreationForm')->name('create-points.create');
				Route::post('/create-points', 'TransactionsController@createPoints')->name('create-points.post');
			});
			Route::get('/settings/change-password', 'SettingsController@showChangePassword');
			Route::get('/settings/change-pin', 'SettingsController@showChangePin');
			Route::post('/change-password', 'SettingsController@changePassword')->name('admin.change-password.post');
			Route::post('/change-pin', 'SettingsController@changePin');
			Route::post('/logout', 'AdminController@logout')->name('admins.logout');
			Route::any('{query}', function () {
				return redirect('/admin/dashboard');
			})->where('query', '.*');
		});
	});
	Route::middleware('auth')->group(function () {
		Route::get('/dashboard', 'HomeController@index')->name('dashboard');
		Route::get('/profile', 'ProfileController@edit')->name('profile');
		Route::patch('/profile/{user}', 'ProfileController@update');
		Route::get('/transactions', 'TransactionsController@index')->name('transactions');		Route::prefix('/network')->group(function () {
			Route::get('/direct-referrals', 'NetworkController@directReferralsIndex');
			Route::get('/referral-link', 'NetworkController@referralLinkShow');
			Route::get('/tree', 'NetworkController@treeShow');
			Route::post('/treeview', 'NetworkController@treeview');
		});
		Route::prefix('/settings')->group(function () {
			Route::get('/', 'SettingsController@create');
			Route::get('/change-password', 'SettingsController@showChangePassword');
			Route::post('/change-password', 'SettingsController@changePassword');
		});
		Route::prefix('purchase')->group(function () {
			Route::get('/membership', 'MembershipController@create')->name('membership.create');
			Route::post('/getAdPackValidation', 'AdPackPurchaseController@getAdPackValidation');
			Route::post('/membership', 'MembershipController@store')->name('membership.post');
			Route::post('/ad-pack', 'AdPackPurchaseController@store')->name('ad_packs.post');
		});
		Route::any('{query}',
			function () {
				return redirect('/dashboard');
			})
			->where('query', '.*');
	});
