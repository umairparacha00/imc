<?php

	namespace App\Http\Controllers;

	use App\UserMembership;
	use Illuminate\Contracts\Support\Renderable;
	use Illuminate\Http\Request;

	class HomeController extends Controller
	{
		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
//        $this->middleware('auth');
		}

		/**
		 * Show the application dashboard.
		 *
		 * @return Renderable
		 */
		public function index(): Renderable
		{
			$UserMembership = UserMembership::where('user_id', current_user()->id)->first();
			return view('dashboard', ['userMembership' => $UserMembership]);
		}
	}
