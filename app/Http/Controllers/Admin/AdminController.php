<?php

	namespace App\Http\Controllers\Admin;

	use App\Admin;
	use App\Balance;
	use App\Link;
	use App\ModelHasRole;
	use App\Orders;
	use App\PendingMembership;
	use App\User;
	use App\Withdraw;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Response;
	use Illuminate\Routing\Redirector;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Session;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;
	use Illuminate\View\View;

	class AdminController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @param Admin $admin
		 * @return Application|Factory|Response|View
		 */
		public function index(Admin $admin)
		{
			$admins = $admin->orderBy('id', 'desc')->paginate(25);
			return view('Admin.index', ['admins' => $admins]);
		}

		public function showDashboard(User $user, Balance $balance, Link $link, ModelHasRole $modelHasRole, Orders $orders, PendingMembership $pendingMembership, withdraw $withdraw)
		{
			$users = $user->usersForAdminDashboard();
			$totalOrders = $orders->all()->count();
			$totalUsers = $user->all()->count();
			$todaysUsers = $user->whereDate('created_at', '=' , today())->count();
			$pendingMemberships = $pendingMembership->where('status', 0)->count();
			$pendingWithdraws = $withdraw->where('status', 0)->count();
			$totalYoutubeLinks = $link->where('link_type', 'Youtube')->count();
			$totalInstagramLinks = $link->where('link_type', 'Instagram')->count();
			$totalFacebookLinks = $link->where('link_type', 'Facebook')->count();
			$totalMainBalance = $balance->totalMainBalance();
			$totalGroupBalance = $balance->totalGroupBalance();
			$partners = $modelHasRole->where('role_id', 3)->count();
			$seniorDirectors = $modelHasRole->where('role_id', 4)->count();
			$directors = $modelHasRole->where('role_id', 5)->count();
			$generalManagers = $modelHasRole->where('role_id', 6)->count();
			$seniorManagers = $modelHasRole->where('role_id', 7)->count();
			$managers = $modelHasRole->where('role_id', 8)->count();
			$seniorOfficers = $modelHasRole->where('role_id', 9)->count();
			$officers = $modelHasRole->where('role_id', 10)->count();
			return view('Admin.dashboard', [
					'users' => $users,
					'totalMainBalance' => $totalMainBalance,
					'pendingWithdraws' => $pendingWithdraws,
					'pendingMemberships' => $pendingMemberships,
					'totalOrders' => $totalOrders,
					'todaysUsers' => $todaysUsers,
					'totalUsers' => $totalUsers,
					'totalFacebookLinks' => $totalFacebookLinks,
					'totalInstagramLinks' => $totalInstagramLinks,
					'totalYoutubeLinks' => $totalYoutubeLinks,
					'totalGroupBalance' => $totalGroupBalance,
					'partners' => $partners,
					'seniorDirectors' => $seniorDirectors,
					'directors' => $directors,
					'generalManagers' => $generalManagers,
					'seniorManagers' => $seniorManagers,
					'managers' => $managers,
					'seniorOfficers' => $seniorOfficers,
					'officers' => $officers
				]
			);
		}

		public function showLoginForm()
		{
			return view('Admin.auth.login');
		}

		public function login(Request $request)
		{
			$data = $this->adminAuthValidator($request->all())->validate();
			if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
				$admin = Admin::where('email', $data['email'])->first();
				if ($admin->status == 0) {
					Auth::guard('admin')->logout();
					return redirect('/admin/login')->with('error_message', 'Your account is inactive');
				}
				return redirect('/admin/dashboard');
			} else {
				Session::flash('error_message', 'Invalid Email or Password');
				return redirect()->back();
			}
		}

		// Validation for Share Balance

		protected function adminAuthValidator(array $data)
		{
			return Validator::make($data, [
				'email' => ['required', 'email'],
				'password' => ['required', 'string']
			]);
		}

		public function logout()
		{
			Auth::guard('admin')->logout();
			return redirect('/admin/login');
		}

		/**
		 * @return Application|Factory|View
		 */
		public function create()
		{
			return view('Admin.create');
		}

		/**
		 * @param Request $request
		 * @return mixed
		 * @throws ValidationException
		 */

		public function store(Request $request)
		{

			$data = $this->validator($request->all())->validate();
			$admin = Admin::create([
				'username' => $data['username'],
				'name' => $data['name'],
				'email' => $data['email'],
				'status' => 1,
				'password' => Hash::make($data['password']),
			]);
			$admin->assignRole(2);
			return redirect(route('admins.index'))->withToastSuccess('Admin Created Successfully!');
		}

		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data)
		{
			$message = [
				'username.regex' => 'Username should only contain alphabets,numbers and underscores',
			];
			return Validator::make($data, [
				'username' => ['required', 'string', 'max:255', 'unique:admins', 'regex:/^([A-Za-z0-9\_]+)$/'],
				'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9 ]*$/'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
				'password' => ['required', 'string', 'min:8', 'confirmed'],
			], $message);
		}

		/**
		 * @param $id
		 * @return Application|Factory|View
		 */

		public function show($id)
		{
			$admin = Admin::findOrFail($id);
			return view('Admin.show', compact('admin'));
		}

		/**
		 * @param int $id
		 * @return Application|Factory|View
		 */

		public function edit(int $id)
		{
			$admin = Admin::findOrFail($id);
			return view('Admin.edit', compact('admin'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param int $id
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function update(Request $request, int $id)
		{
			$admin = Admin::findOrFail($id);

			$validData = $this->updateValidator($request->all())->validate();

			if ($request->username !== null) {
				$data['username'] = $validData['username'];
			}
			if ($request->name !== null) {
				$data['name'] = $validData['name'];
			}
			if ($request->password !== null) {
				$data['password'] = $validData['password'];
			}
			if ($request->status !== null) {
				$data['status'] = $validData['status'];
			}
			if ($request->pl_pin !== null) {
				$data['pl_pin'] = $validData['pl_pin'];
			}

			$data['password'] = $admin->password;
			if ($request->password !== null) {
				$data['password'] = Hash::make($validData['password']);
			}
			$admin->update($data);
			return redirect(route('admins.index'))->withToastSuccess('Admin Updated Successfully!');
		}

		protected function updateValidator(array $data)
		{
			$rules = [
				'username' => ['Nullable', 'string', 'max:255', 'regex:/^([A-Za-z0-9.\_]+)$/'],
				'name' => ['Nullable', 'string', 'max:255', 'regex:/^[a-zA-Z0-9. ]*$/'],
				'password' => ['Nullable'],
				'status' => ['Nullable', 'in:0, 1, 2, 3'],
				'pl_pin' => ['Nullable', 'numeric'],
			];

			return Validator::make($data, $rules);
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param int $id
		 * @return Application|RedirectResponse|Response|Redirector
		 */
		public function destroy($id)
		{
			$admin = Admin::findOrFail($id);
			$admin->delete();
			return redirect(route('admins.index'))->withToastSuccess('Admin with username ' . $admin->username . ' deleted successfully.');
		}

		public function getAdminDetailsForDestroying(Request $request, Admin $admin)
		{
			$data = $request->all();
			$adminInfo = $admin->where('id', $data['id'])->first();
			$array = ['username' => $adminInfo->username, 'name' => $adminInfo->name];
			return response()->json($array);
		}
	}


