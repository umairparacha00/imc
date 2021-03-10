<?php

	namespace App\Http\Controllers;

	use App\Events\MembershipPurchased;
	use App\Membership;
	use App\UserMembership;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;

	class MembershipController extends Controller
	{

		public function create(Membership $membership)
		{
			$memberships = $membership->all();
			$userMembership = $membership->where('id', current_user()->membership()->id)->first();
			$price = $userMembership->price;
			return view('purchase.membership', ['memberships' => $memberships, 'price' => $price]);
		}

		public function store(Request $request, Pin $pin, UserMembership $userMembership)
		{
			$this->validator($request->all())->validate();
			$pinData = $pin->checkPin($request->pin);
			if ($pinData->user_id == current_user()->id) {
				$selectedMembershipName = $request->name;

				$membershipData = Membership::where('name', $request->name)->firstOrFail();

				$membershipId = $membershipData->id;

				if (current_user()->membership()->id > $membershipId) {
					return back()->with('toast_error', 'Cannot purchase' . $request->name . 'Membership');
				}
				if ($selectedMembershipName === 'Basic') {

					$membershipData = Membership::where('name', 'Basic')->first();

					$id = $membershipData->id;

					$price = $membershipData->price;

					if ($pinData->pin_remaining_value >= $price) {

						$userMembership->upgradeMembershipForThreeYears(current_user()->id, $id);

						$pin->updatePinRemainingValue($pinData->id, $this->getPinRemainingValue($pinData->pin_remaining_value, $price));
						event(new MembershipPurchased(current_user()->sponsor, $price));

						return back()->with('toast_success', $selectedMembershipName . ' Purchased Successfully');
					} else {

						return back()->with('toast_error', 'Pin balance is insufficient');
					}

				} elseif ($selectedMembershipName === 'Silver') {

					$membershipData = Membership::where('name', 'Silver')->first();

					$id = $membershipData->id;

					$price = $membershipData->price;

					if ($pinData->pin_remaining_value >= $price) {

						$userMembership->upgradeMembershipForThreeYears(current_user()->id, $id);

						$pin->updatePinRemainingValue($pinData->id, $this->getPinRemainingValue($pinData->pin_remaining_value, $price));

						event(new MembershipPurchased(current_user()->sponsor, $price));

						return back()->with('toast_success', $selectedMembershipName . ' Purchased Successfully');

					} else {

						return back()->with('toast_error', 'Pin balance is insufficient');
					}
				} elseif ($selectedMembershipName === 'Gold') {

					$membershipData = Membership::where('name', 'Gold')->first();

					$id = $membershipData->id;

					$price = $membershipData->price;
					if ($pinData->pin_remaining_value >= $price) {

						$userMembership->upgradeMembershipForThreeYears(current_user()->id, $id);

						$pin->updatePinRemainingValue($pinData->id, $this->getPinRemainingValue($pinData->pin_remaining_value, $price));

						event(new MembershipPurchased(current_user()->sponsor, $price));

						return back()->with('toast_success', $selectedMembershipName . ' Purchased Successfully');

					} else {

						return back()->with('toast_error', 'Pin balance is insufficient');
					}
				} elseif ($selectedMembershipName === 'Emerald') {
					$membershipData = Membership::where('name', 'Emerald')->first();
					$id = $membershipData->id;
					$price = $membershipData->price;
					if ($pinData->pin_remaining_value >= $price) {
						$userMembership->upgradeMembership(current_user()->id, $id);
						$pin->updatePinRemainingValue($pinData->id, $this->getPinRemainingValue($pinData->pin_remaining_value, $price));
						event(new MembershipPurchased(current_user()->sponsor, $price));
						return back()->with('toast_success', $selectedMembershipName . ' Purchased Successfully');
					} else {
						return back()->with('toast_error', 'Pin balance is insufficient');
					}
				} elseif ($selectedMembershipName === 'Sapphire') {
					$membershipData = Membership::where('name', 'Sapphire')->first();
					$id = $membershipData->id;
					$price = $membershipData->price;
					if ($pinData->pin_remaining_value >= $price) {
						$userMembership->upgradeMembership(current_user()->id, $id);
						$pin->updatePinRemainingValue($pinData->id, $this->getPinRemainingValue($pinData->pin_remaining_value, $price));
						event(new MembershipPurchased(current_user()->sponsor, $price));
						return back()->with('toast_success', $selectedMembershipName . ' Purchased Successfully');
					} else {
						return back()->with('toast_error', 'Pin balance is insufficient');
					}
				} elseif ($selectedMembershipName === 'Platinum') {
					$membershipData = Membership::where('name', 'Platinum')->first();
					$id = $membershipData->id;
					$price = $membershipData->price;
					if ($pinData->pin_remaining_value >= $price) {
						$userMembership->upgradeMembership(current_user()->id, $id);
						$pin->updatePinRemainingValue($pinData->id, $this->getPinRemainingValue($pinData->pin_remaining_value, $price));
						event(new MembershipPurchased(current_user()->sponsor, $price));
						return back()->with('toast_success', $selectedMembershipName . ' Purchased Successfully');
					} else {
						return back()->with('toast_error', 'Pin balance is insufficient');
					}
				} elseif ($selectedMembershipName === 'Diamond') {
					$membershipData = Membership::where('name', 'Diamond')->first();
					$id = $membershipData->id;
					$price = $membershipData->price;
					if ($pinData->pin_remaining_value >= $price) {

						$userMembership->upgradeMembership(current_user()->id, $id);
						$pin->updatePinRemainingValue($pinData->id, $this->getPinRemainingValue($pinData->pin_remaining_value, $price));
						event(new MembershipPurchased(current_user()->sponsor, $price));
						return back()->with('toast_success', $selectedMembershipName . ' Purchased Successfully');
					} else {
						return back()->with('toast_error', 'Pin balance is insufficient');
					}
				}
			}
			else{
				return redirect(route('pin.create'))->with('toast_error', 'This pin belongsTo another User');
			}
		}

		protected function validator(array $data)
		{
			$message = [
				'pin.exists' => 'Given pin does not exist.'
			];
			return Validator::make($data, [
				'name' => ['required', 'string', 'exists:memberships,name'],
				'pin' => ['required', 'string', 'exists:pins,pin']
			], $message);
		}

		protected function getPinRemainingValue($pinValue, $subtractionAmount)
		{
			return $pinValue - $subtractionAmount;
		}

		public function getMembershipPrice(Request $request, Membership $membership)
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
