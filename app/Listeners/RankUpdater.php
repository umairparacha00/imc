<?php

namespace App\Listeners;

use App\Rank;
use App\Rate;
use App\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RankUpdater
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
	 * @param Login $event
	 * @return void
	 */
	public function handle(Login $event)
	{
		if ($event->user->getRoleNames()[0] == 'super-admin' || $event->user->getRoleNames()[0] == 'admin') {

		}
		else{
			$event->user->update(
				[
					'last_logged_at' => now()->timezone("Asia/Karachi")
				]
			);
			$downlineUsers = User::where('sponsor', $event->user->account_id)->get();
			if (count($downlineUsers) >= 3) {
				if ($event->user->getRoleNames()[0] == 'struggling') {
					$rates = Rate::where('name', 'officer_leg')->first();
					$number = 0;
					foreach ($downlineUsers as $user) {
						if (user_downline_investment($user->account_id, $event->user->account_id) >= $rates->rate) {
							$number++;
						}
					}
					if ($number >= 3) {
						$event->user->syncRoles(10);
						Rank::create([
							'user_id' => $event->user->id,
							'rank_name' => 'officer',
							'status' => 0,
						]);
					}
				}
				if ($event->user->getRoleNames()[0] == 'officer') {
					$rates = Rate::where('name', 'senior_officer_leg')->first();
					$number = 0;
					foreach ($downlineUsers as $user) {
						if (user_downline_investment($user->account_id, $event->user->account_id) >= $rates->rate) {
							$number++;
						}
					}
					if ($number >= 3) {
						$event->user->syncRoles(9);
						Rank::create([
							'user_id' => $event->user->id,
							'rank_name' => 'senior-officer',
							'status' => 0,
						]);
					}
				}
				if ($event->user->getRoleNames()[0] == 'senior-officer') {
					$rates = Rate::where('name', 'manager_leg')->first();
					$number = 0;
					foreach ($downlineUsers as $user) {
						if (user_downline_investment($user->account_id, $event->user->account_id) >= $rates->rate) {
							$number++;
						}
					}
					if ($number >= 3) {
						$event->user->syncRoles(8);
						Rank::create([
							'user_id' => $event->user->id,
							'rank_name' => 'manager',
							'status' => 0,
						]);
					}
				}
				if ($event->user->getRoleNames()[0] == 'manager') {
					$rates = Rate::where('name', 'senior_manager_leg')->first();
					$number = 0;
					foreach ($downlineUsers as $user) {
						if (user_downline_investment($user->account_id, $event->user->account_id) >= $rates->rate) {
							$number++;
						}
					}
					if ($number >= 3) {
						$event->user->syncRoles(7);
						Rank::create([
							'user_id' => $event->user->id,
							'rank_name' => 'senior-manager',
							'status' => 0,
						]);
					}
				}
				if ($event->user->getRoleNames()[0] == 'senior-manager') {
					$rates = Rate::where('name', 'general_manager_leg')->first();
					$number = 0;
					foreach ($downlineUsers as $user) {
						if (user_downline_investment($user->account_id, $event->user->account_id) >= $rates->rate) {
							$number++;
						}
					}
					if ($number >= 3) {
						$event->user->syncRoles(6);
						Rank::create([
							'user_id' => $event->user->id,
							'rank_name' => 'general-manager',
							'status' => 0,
						]);
					}
				}
				if ($event->user->getRoleNames()[0] == 'general-manager') {
					$rates = Rate::where('name', 'director_leg')->first();
					$number = 0;
					foreach ($downlineUsers as $user) {
						if (user_downline_investment($user->account_id, $event->user->account_id) >= $rates->rate) {
							$number++;
						}
					}
					if ($number >= 3) {
						$event->user->syncRoles(5);
						Rank::create([
							'user_id' => $event->user->id,
							'rank_name' => 'director',
							'status' => 0,
						]);
					}
				}
				if ($event->user->getRoleNames()[0] == 'director') {
					$rates = Rate::where('name', 'senior_director_leg')->first();
					$number = 0;
					foreach ($downlineUsers as $user) {
						if (user_downline_investment($user->account_id, $event->user->account_id) >= $rates->rate) {
							$number++;
						}
					}
					if ($number >= 3) {
						$event->user->syncRoles(4);
						Rank::create([
							'user_id' => $event->user->id,
							'rank_name' => 'senior-director',
							'status' => 0,
						]);
					}
				}
				if ($event->user->getRoleNames()[0] == 'senior-director') {
					$rates = Rate::where('name', 'partner_leg')->first();
					$number = 0;
					foreach ($downlineUsers as $user) {
						if (user_downline_investment($user->account_id, $event->user->account_id) >= $rates->rate) {
							$number++;
						}
					}
					if ($number >= 3) {
						$event->user->syncRoles(3);
						Rank::create([
							'user_id' => $event->user->id,
							'rank_name' => 'partner',
							'status' => 0,
						]);
					}
				}
			}
		}

	}
}
