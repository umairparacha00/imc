<?php

	namespace App\Http\Controllers\Auth;

	use App\Balance;
	use App\Http\Controllers\Controller;
	use App\Providers\RouteServiceProvider;
	use App\User;
	use App\UserMembership;
	use Carbon\Carbon;
	use Illuminate\Foundation\Auth\RegistersUsers;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Validator;

	class RegisterController extends Controller
	{
		/*
		|--------------------------------------------------------------------------
		| Register Controller
		|--------------------------------------------------------------------------
		|
		| This controller handles the registration of new users as well as their
		| validation and creation. By default this controller uses a trait to
		| provide this functionality without requiring any additional code.
		|
		*/

		use RegistersUsers;

		/**
		 * Where to redirect users after registration.
		 *
		 * @var string
		 */
		protected $redirectTo = RouteServiceProvider::HOME;

		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->middleware('guest');
		}


		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			$message = [
				'username.regex' => 'Username should only contain alphabets,numbers and underscores',
				'g-recaptcha-response.required' => 'Please check the captcha'
			];
			return Validator::make($data, [
				'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^([A-Za-z0-9\_]+)$/'],
				'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9 ]*$/'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'sponsor' => ['required', 'numeric', 'exists:users,account_id'],
				'password' => ['required', 'string', 'min:8', 'confirmed'],
//				'g-recaptcha-response' => 'required|captcha',
			], $message);
		}

		/**
		 * Create a new user instance after a valid registration.
		 *lo
		 * @param array $data
		 * @return User
		 */
		protected function create(array $data): User
		{
			$user = User::create([
				'account_id' => mt_rand(100000000000000, 9999999999999999),
				'username' => $data['username'],
				'name' => $data['name'],
				'email' => $data['email'],
				'sponsor' => $data['sponsor'],
				'password' => Hash::make($data['password']),
			]);
			Balance::create([
				'user_id' => $user->id,
			]);
			UserMembership::create([
				'user_id' => $user->id,
				'membership_id' => 1,
				'expires_at' => Carbon::today()->addCentury()
			]);
			$user->assignRole(11);
			return $user;
		}
	}
