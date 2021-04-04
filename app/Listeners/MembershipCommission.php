<?php

	namespace App\Listeners;

	use App\Transaction;
	use App\User;
	use App\Rate;
	use App\Balance;
	use App\Events\MembershipPurchased;
	use App\UserMembership;

	class MembershipCommission
	{
		/**
		 * Create the event listener.
		 *
		 * @return void
		 */
		public function __construct()
		{
			//
		}

		/**
		 * Handle the event.
		 *
		 * @param MembershipPurchased $event
		 * @return void
		 */
		public function handle(MembershipPurchased $event)
		{
			$sponsor_account_id = $event->sponsor_account_id;
			$directCommissionPercentage = Rate::where('name', 'membership_commission')->first();
			$percentage = $directCommissionPercentage->rate;
			// Get The User
			$sponsor = User::where('account_id', $sponsor_account_id)->first();
			$this->commissionProcesses($event, $sponsor, $percentage, 1);

			// Action for Indirect Commission
			$inDirectSponsor = User::where('account_id', $sponsor->sponsor)->first();
			$userMembership = UserMembership::where('user_id', $inDirectSponsor->id)->first();
			$userMembershipId = $userMembership->membership_id;
			$inDirectCommissionPercentage = Rate::where('name', 'membership_indirect_commission')->first();

			$percentage = $inDirectCommissionPercentage->rate;

			if ($event->user->membershipId->status == 1) {
				$x = 2;
				while ($x <= 7) {
					if ($x > 1 && $x <= 7) {
						if ($inDirectSponsor->sponsor == 1000000000000) {
							break;
						} else {
							if ($userMembershipId > 1) {
								$this->commissionProcesses($event, $inDirectSponsor, $percentage, $x);
							}
							$inDirectSponsor = User::where('account_id', $inDirectSponsor->sponsor)->first();
							$userMembership = UserMembership::where('user_id', $inDirectSponsor->id)->first();
							$userMembershipId = $userMembership->membership_id;
						}
					}
					$x++;
				}
			}
		}

		protected function commissionProcesses(MembershipPurchased $event, $sponsor, $percentage, $level)
		{
			$userBalance = Balance::where('user_id', $sponsor->id)->first();

			// Commission Calculation
			$totalDirectCommission = $event->totalAmount * $percentage / 100;

			$newGroupBalance = $userBalance->group_balance + $totalDirectCommission;
			$newMainBalance = $userBalance->main_balance + $totalDirectCommission;
			// Transaction for Direct Commission

			(new Transaction)->createTransaction($sponsor->id,
				'Credit',
				$totalDirectCommission,
				$newGroupBalance,
				$userBalance->group_balance,
				'Commission received on purchase of Membership by ' . $event->user->username . ' from level: ' . $level,
				'Group Balance'
			);

			(new Transaction)->createTransaction($sponsor->id,
				'Credit',
				$totalDirectCommission,
				$newMainBalance,
				$userBalance->main_balance,
				'Commission received on purchase of Membership by ' . $event->user->username . ' from level: ' . $level,
				'Main Balance'
			);

			// Update the Group Balance
			(new Balance)->updateGroupBalance($sponsor->id, $newGroupBalance);
			// Update the Main Balance
			(new Balance)->updateMainBalance($sponsor->id, $newMainBalance);
		}
	}
