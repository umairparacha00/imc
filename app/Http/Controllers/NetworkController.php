<?php

	namespace App\Http\Controllers;

	use App\User;

	class NetworkController extends Controller
	{
		public function directReferralsIndex()
		{
			$directReferrals = User::where('sponsor', current_user()->account_id)
				->orderBy('id', 'asc')
				->paginate(15);
			return view('network.direct-referrals', compact('directReferrals'));
		}

		public function referralLinkShow(User $user)
		{
			return view('network.referral-link', compact('user'));
		}

		public function treeShow()
		{
			$users = User::where('sponsor', current_user()->account_id)->get();
			return view('network.tree', compact('users'));
		}
	}
