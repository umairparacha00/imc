<?php

	namespace App\Http\Controllers\Admin;

	use App\Events\MembershipPurchased;
	use App\Http\Controllers\Controller;
	use App\PendingMembership;
	use App\User;
	use Carbon\Carbon;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\View\View;

	class UserMembershipController extends Controller
	{

		/**
		 * Display a listing of the resource.
		 *
		 * @return View
		 */
		public function indexPending(): View
		{
			$pendingMemberships = PendingMembership::where('status', 0)->get();
			return view('Admin.memberships.pending', compact('pendingMemberships'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create()
		{
			//
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param Request $request
		 * @return Response
		 */
		public function store(Request $request)
		{
			//
		}

		/**
		 * Display the specified resource.
		 *
		 * @param int $id
		 * @return Response
		 */
		public function show($id)
		{
			//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param int $id
		 * @return Response
		 */
		public function edit($id)
		{
			//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param int $id
		 * @return Response
		 */
		public function update(Request $request, $id)
		{
			//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param int $id
		 * @return Response
		 */
		public function destroy($id)
		{
			//
		}

		public function approve($id)
		{
			$pendingMembership = PendingMembership::where('id', $id)->first();
			$user = User::findOrFail($pendingMembership->user_id);
			$user->update(['purchasing_status' => 'can']);
			$pendingMembership->update([
				'status' => 1
			]);
			$user->membershipId()->update([
				'membership_id' => $pendingMembership->membership_id,
				'expires_at' => Carbon::today()->addYear(),
				'status' => 1,
			]);
			event(new MembershipPurchased($user->sponsor, $pendingMembership->transaction_amount, $user));
			return back()->withToastSuccess('Membership approved successfully!');
		}

		public function reject($id)
		{
			$pendingMembership = PendingMembership::where('id', $id)->first();
			$user = User::findOrFail($pendingMembership->user_id);
			$user->update(['purchasing_status' => 'can']);
			return back()->withToastSuccess('Document rejected successfully!');
		}
	}
