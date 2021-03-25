<?php

	namespace App\Http\Controllers\Admin;

	use App\Balance;
	use App\FollowedLinks;
	use App\Http\Controllers\Controller;
	use App\Link;
	use App\Rate;
	use App\User;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\View;
	use Illuminate\Validation\ValidationException;

	class LinkController extends Controller
	{
		/**
		 * @return Application|Factory|Response|\Illuminate\View\View
		 */
		public function index()
		{
			$links = Link::all();
			return view('Admin.links.index', ['links' => $links]);
		}

		/**
		 * @return Application|Factory|Response|\Illuminate\View\View
		 */
		public function pending()
		{
			$links = FollowedLinks::where('status', 0)->paginate(15);
			return view('Admin.links.pending', ['links' => $links]);
		}

		/**
		 * @return Application|Factory|Response|\Illuminate\View\View
		 */
		public function create()
		{
			return view('Admin.links.create');
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param Request $request
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function store(Request $request)
		{
			$data = $this->validator($request->all())->validate();
			Link::create(['link_type' => $data['link_type'], 'link' => $data['link']]);
			return redirect(route('links.index'))->withToastSuccess('Link Added Successfully!');
		}

		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			return Validator::make($data, [
				'link_type' => ['required', 'string', 'in:Youtube,Instagram,Facebook'],
				'link' => ['required', 'string', 'unique:links,link'],
			]);
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
		 * @return Application|Factory|Response|\Illuminate\View\View
		 */
		public function edit(int $id)
		{
			$link = Link::findOrFail($id);
			return view('Admin.links.edit', compact('link'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param int $id
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function update(Request $request, int $id): RedirectResponse
		{
			$role = Link::findOrFail($id);
			$data = $this->updateValidator($request->all())->validate();
			$role->update($data);
			return redirect(route('links.index'))->withToastSuccess('Link Updated Successfully!');
		}

		protected function updateValidator(array $data)
		{
			return Validator::make($data, [
				'link_type' => ['required', 'string', 'in:Youtube,Instagram,Facebook'],
				'link' => ['required', 'string'],
			]);
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param int $id
		 * @return RedirectResponse
		 */
		public function destroy(int $id): RedirectResponse
		{
			$link = Link::findOrFail($id);
			$link->delete();
			return redirect(route('links.index'))->withToastSuccess('Link deleted successfully.');
		}

		/**
		 * @param Request $request
		 * @param Link $link
		 * @return JsonResponse
		 */

		public function getLinkDetailsForDestroying(Request $request, Link $link): JsonResponse
		{
			$data = $request->validate([
				'id' => ['required', 'numeric', 'exists:links,id']
			]);
			$linkInfo = $link->where('id', $data['id'])->first();
			$array = ['id' => $linkInfo->id, 'link_type' => $linkInfo->link_type];
			return response()->json($array);
		}

		/**
		 * @param $id
		 * @param Rate $rate
		 * @param Balance $balance
		 * @param User $user
		 * @return mixed
		 */
		public function approve($id, Rate $rate, Balance $balance, User $user)
		{

			$link = FollowedLinks::findOrFail($id);
			$linkUser = $user->findOrFail($link->user_id);
			$linkType = $link->link->link_type;
			if ($link->status === 0) {
				$link->update(
					[
						'status' => 1
					]
				);
				$this->subscriberEarningCalculation($rate, $balance, $linkUser, $linkType);
				return redirect(route('links.pending'))->withToastSuccess('Link Earning approved successfully!');
			}
			else{
				return redirect(route('links.pending'))->with('toast_error','Link Earning already approved.');

			}
		}

		protected function subscriberEarningCalculation($rate, $balance, $user, $linkType)
		{
			$currentMainBalance = $user->balance->main_balance;

			if (current_user_membership($user->id) == 'Starter') {

			} elseif (current_user_membership($user->id) == 'Joining') {
				if ($linkType === 'Youtube') {
					$Rate = $rate->where('name', 'joining_membership_subscriber')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on subscribing channel by ');
				} elseif ($linkType === 'Instagram') {
					$Rate = $rate->where('name', 'joining_membership_instagram_follower')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on following profile by ');
				} else {
					$Rate = $rate->where('name', 'joining_membership_facebook_follower')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on following profile by ');
				}
				return redirect(route('links.pending'))->withToastSuccess('Earning Approved Successfully.');

			} elseif (current_user_membership($user->id) == 'Basic') {
				if ($linkType === 'Youtube') {
					$Rate = $rate->where('name', 'basic_membership_subscriber')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on subscribing channel by ');
				} elseif ($linkType === 'Instagram') {
					$Rate = $rate->where('name', 'basic_membership_instagram_follower')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on following profile by ');
				} else {
					$Rate = $rate->where('name', 'basic_membership_facebook_follower')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on following profile by ');
				}
				return redirect(route('links.pending'))->withToastSuccess('Earning Approved Successfully.');

			} elseif (current_user_membership($user->id) == 'Silver') {
				if ($linkType === 'Youtube') {
					$Rate = $rate->where('name', 'silver_membership_subscriber')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on subscribing channel by ');
				} elseif ($linkType === 'Instagram') {
					$Rate = $rate->where('name', 'silver_membership_instagram_follower')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on following profile by ');
				} else {
					$Rate = $rate->where('name', 'silver_membership_facebook_follower')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on following profile by ');
				}
				return redirect(route('links.pending'))->withToastSuccess('Earning Approved Successfully.');

			} elseif (current_user_membership($user->id) == 'Gold') {
				if ($linkType === 'Youtube') {
					$Rate = $rate->where('name', 'gold_membership_subscriber')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on subscribing channel by ');
				} elseif ($linkType === 'Instagram') {
					$Rate = $rate->where('name', 'gold_membership_instagram_follower')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on following profile by ');

				} else {
					$Rate = $rate->where('name', 'gold_membership_facebook_follower')->first();
					$this->balanceTransaction($Rate, $currentMainBalance, $balance, $user, 'Earning added on following profile by ');
				}
				return redirect(route('links.pending'))->withToastSuccess('Earning Approved Successfully.');
			}
		}

		protected function balanceTransaction($Rate, $currentMainBalance, $balance, $user, $transactionDetails)
		{
			$totalEarned = $Rate->rate;

			$total = $totalEarned + $currentMainBalance;

			DB::transaction(function () use ($transactionDetails, $user, $currentMainBalance, $totalEarned, $total, $balance) {
				$balance->updateMainBalance($user->id, $total);
				$user
					->addTransaction('main_balance', 'Credit', $totalEarned, $currentMainBalance, $user->balance->currentMainBalance($user->id), $transactionDetails, $user->id);
			});
		}

		public function reject($id)
		{
			$pendingMembership = PendingMembership::where('id', $id)->first();
			$user = User::findOrFail($pendingMembership->user_id);
			$user->update(['purchasing_status' => 'can']);
			return back()->withToastSuccess('Document rejected successfully!');
		}
	}
