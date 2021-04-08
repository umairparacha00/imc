<?php

	namespace App\Http\Controllers\Admin;

	use App\Events\MembershipPurchased;
	use App\Http\Controllers\Controller;
	use App\PendingMembership;
	use App\User;
	use Carbon\Carbon;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\DB;
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
			$pendingMemberships = PendingMembership::where('status', 0)->paginate(10);
			return view('Admin.memberships.pending', compact('pendingMemberships'));
		}
		public function approve($id)
		{
			DB::transaction(function () use ($id) {
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
			});
			return back()->withToastSuccess('Membership approved successfully!');
		}

		public function rejection($id)
		{
			$pendingMembership = PendingMembership::where('id', $id)->first('id');
			return view('Admin.memberships.rejection', compact('pendingMembership'));
		}

		public function reject($id, Request $request)
		{
			$pendingMembership = PendingMembership::where('id', $id)->first();
			$pendingMembership->update(
				[
					'status' => 2,
					'rejectionReason' => $request->rejectionReason
				]
			);
			$user = User::findOrFail($pendingMembership->user_id);
			$user->update(['purchasing_status' => 'can']);
			return redirect(route('memberships.pending'))->withToastSuccess('Membership rejected successfully!');
		}
	}
