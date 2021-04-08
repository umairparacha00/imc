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
			Route::prefix('memberships')->group(function () {
				Route::get('pending', 'UserMembershipController@indexPending')->name('memberships.pending');
				Route::put('{pending_memberships}/approve', 'UserMembershipController@approve')->name('memberships.approve');
				Route::get('{pending_memberships}/edit', 'UserMembershipController@rejection')->name('memberships.rejection');
				Route::put('{pending_memberships}/reject', 'UserMembershipController@reject')->name('memberships.reject');
			});
			Route::resource('memberships', 'MembershipController');
			Route::resource('services', 'ServicesController');
			Route::prefix('orders')->group(function () {
				Route::get('pending', 'OrdersController@pending')->name('orders.pending');
				Route::put('{order}/approve', 'OrdersController@approve')->name('orders.approve');
				Route::put('{order}/reject', 'OrdersController@reject')->name('orders.reject');
			});
			Route::resource('orders', 'OrdersController');
			Route::prefix('links')->group(function () {
				Route::get('pending', 'LinkController@pending')->name('links.pending');
				Route::put('{link}/approve', 'LinkController@approve')->name('links.approve');
				Route::put('{link}/reject', 'LinkController@reject')->name('links.reject');
			});
			Route::resource('links', 'LinkController');
			Route::resource('payment-gateways', 'PaymentGatewayController');
			Route::post('/getLinkDetailsForDestroying', 'LinkController@getLinkDetailsForDestroying');
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
				Route::resource('rates', 'RatesController');
				Route::prefix('withdraws')->group(function () {
					Route::get('/pending', 'WithdrawController@pending')->name('withdraws.pending');
					Route::put('{withdraw}/approve', 'WithdrawController@approve')->name('withdraws.approve');
					Route::put('{withdraw}/reject', 'WithdrawController@reject')->name('withdraws.reject');
				});
				Route::resource('withdraws', 'WithdrawController');
				Route::post('/getRateDetailsForDestroying', 'RatesController@getRateDetailsForDestroying');
				Route::post('/getServiceDetailsForDestroying', 'ServicesController@getServiceDetailsForDestroying');
				Route::post('/getGatewayDetailsForDestroying', 'RatesController@getGatewayDetailsForDestroying');
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
			Route::post('/change-password', 'SettingsController@changePassword')->name('admin.change-password.post');
			Route::post('/logout', 'AdminController@logout')->name('admins.logout');
			Route::any('{query}', function () {
				return redirect('/admin/dashboard');
			})->where('query', '.*');
		});
	});
	Route::middleware(['auth'])->group(function () {
		Route::get('/dashboard', 'HomeController@index')->name('dashboard');
		Route::get('/profile', 'ProfileController@edit')->name('profile');
		Route::patch('/profile/{user}', 'ProfileController@update');
		Route::get('/transactions', 'TransactionsController@index')->name('transactions');
		Route::get('/withdraw', 'WithdrawController@create')->name('withdraw.create');
		Route::post('/withdraw/{user}', 'WithdrawController@store')->name('withdraw.store');
		Route::prefix('/network')->group(function () {
			Route::get('/direct-referrals', 'NetworkController@directReferralsIndex');
			Route::get('/referral-link', 'NetworkController@referralLinkShow');
			Route::get('/tree', 'NetworkController@treeShow');
			Route::post('/treeview', 'NetworkController@treeview');
		});
		Route::prefix('/youtube')->group(function () {
			Route::get('/channels', 'YoutubeController@index')->name('youtube.channels.index');
			Route::get('/channels/{link}', 'YoutubeController@show')->name('youtube.channels.show');
			Route::post('/channel/{link}', 'YoutubeController@store')->name('youtube.channels.store');
		});
		Route::prefix('/facebook')->group(function () {
			Route::get('/pages', 'FacebookController@index')->name('facebook.pages.index');
			Route::get('/pages/{link}', 'FacebookController@show')->name('facebook.page.show');
			Route::post('/page/{link}', 'FacebookController@store')->name('facebook.page.store');
		});
		Route::prefix('/instagram')->group(function () {
			Route::get('/profiles', 'InstagramController@index')->name('instagram.profiles.index');
			Route::get('/profiles/{link}', 'InstagramController@show')->name('instagram.profile.show');
			Route::post('/profile/{link}', 'InstagramController@store')->name('instagram.profiles.store');
		});
		Route::prefix('/settings')->group(function () {
			Route::get('/', 'SettingsController@create');
			Route::get('/change-password', 'SettingsController@showChangePassword');
			Route::post('/change-password', 'SettingsController@changePassword');
		});
		Route::prefix('purchase')->group(function () {
			Route::get('/membership', 'MembershipController@create')->name('membership.create');
			Route::get('/services', 'PurchaseController@create')->name('purchase.services.create');
			Route::post('/membership', 'MembershipController@store')->name('membership.post');
			Route::post('/services', 'PurchaseController@store')->name('purchase.services.post');
		});
		Route::post('/getMembershipPrice', 'MembershipController@getMembershipPrice');
		Route::post('/getServicePrice', 'PurchaseController@getServicePrice');
		Route::any('{query}',
			function () {
				return redirect('/dashboard');
			})
			->where('query', '.*');
	});
