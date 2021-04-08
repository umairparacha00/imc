<?php

	namespace App\Http\Controllers;

	use App\Membership;
	use App\PaymentGateway;
	use App\PendingMembership;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;

	class MembershipController extends Controller
	{

		public function create(Membership $membership, PendingMembership $pendingMembership)
		{
			$memberships = $membership->all();
			$pendingMemberships = $pendingMembership->where('user_id', current_user()->id)->get();
			return view('purchase.membership', ['memberships' => $memberships, 'pendingMemberships' => $pendingMemberships]);
		}

		public function store(Request $request, PendingMembership $PendingMembership)
		{
			$validatedData = $this->validator($request->all())->validate();
			$selectedMembershipName = $validatedData['name'];
			if (current_user()->purchasing_status === 'can_not') {
				throw ValidationException::withMessages([
					'purchasing_status' => 'A membership request is in pending Already.'
				]);
			} else {
				if ($selectedMembershipName === 'Joining') {
					$membershipData = Membership::where('name', 'Joining')->first();

					$this->purchasingRequest($membershipData, $PendingMembership, $validatedData);
					return redirect(route('membership.create'))->with('toast_success', 'The Purchasing  request for ' . $selectedMembershipName . ' membership sent Successfully');

				} elseif ($selectedMembershipName === 'Basic') {
					$membershipData = Membership::where('name', 'Basic')->first();
					$this->purchasingRequest($membershipData, $PendingMembership, $validatedData);
					return redirect(route('membership.create'))->with('toast_success', 'The Purchasing  request for ' . $selectedMembershipName . ' membership sent Successfully');
				} elseif ($selectedMembershipName === 'Silver') {
					$membershipData = Membership::where('name', 'Silver')->first();
					$this->purchasingRequest($membershipData, $PendingMembership, $validatedData);
					return redirect(route('membership.create'))->with('toast_success', 'The Purchasing  request for ' . $selectedMembershipName . ' membership sent Successfully');
				} elseif ($selectedMembershipName === 'Gold') {
					$membershipData = Membership::where('name', 'Gold')->first();
					$this->purchasingRequest($membershipData, $PendingMembership, $validatedData);
					return redirect(route('membership.create'))->with('toast_success', 'The Purchasing  request for ' . $selectedMembershipName . ' membership sent Successfully');
				}
			}
		}

		protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			$message = [
				'name.required' => 'Select a Membership',
				'transaction_id.required' => 'Transaction Id is required'
			];
			return Validator::make($data, [
				'name' => ['required', 'string', 'exists:memberships,name'],
				'transaction_id' => ['required', 'string', 'regex:/^([A-Za-z0-9\_#]+)$/'],
				'payment_gateway_id' => ['required', 'exists:payment_gateways,id'],
			], $message);
		}

		protected function purchasingRequest($membershipData, $PendingMembership, $validatedData)
		{
			$id = $membershipData->id;

			$price = $membershipData->price;

			$PendingMembership->add(current_user()->id, $id, $validatedData['payment_gateway_id'], $validatedData['transaction_id'], $price);

			current_user()->update(
				[
					'purchasing_status' => 'can_not'
				]
			);
		}

		public function getMembershipPrice(Request $request, Membership $membership): JsonResponse
		{
			$value = $this->validator($request->all())->validate();
			$membershipInfo = $membership->where('name', $value['name'])->first();
			if ($membershipInfo === null) {
				throw ValidationException::withMessages([
					'name' => 'Username dose not exists'
				]);
			} else {
				$name = $value['name'];
				$price = $membershipInfo['price'];
				$array = ['name' => $name, 'price' => $price];
				return response()->json($array);
			}
		}
	}
