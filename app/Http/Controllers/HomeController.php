<?php

	namespace App\Http\Controllers;

	use App\FollowedLinks;
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
			$userFollowedLinks = FollowedLinks::where('user_id',current_user()->id)->where('status', 1)->get();
			$subscribedChannels = 0;
			$instagramFollowed = 0;
			$facebookFollowed = 0;
			foreach ($userFollowedLinks as $link){
				if ($link->link->link_type == 'Youtube') {
				    $subscribedChannels++;
				}
				elseif($link->link->link_type == 'Instagram'){
				    $instagramFollowed++;
				}
				elseif($link->link->link_type == 'Facebook'){
					$facebookFollowed++;
				}
			}
			$profilesFollowed = $instagramFollowed + $facebookFollowed;
			return view('dashboard', ['userMembership' => $UserMembership, 'subscribedChannels' => $subscribedChannels, 'profilesFollowed' => $profilesFollowed]);
		}
	}
