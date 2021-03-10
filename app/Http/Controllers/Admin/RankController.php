<?php

namespace App\Http\Controllers\Admin;

use App\Balance;
use App\Http\Controllers\Controller;
use App\Rank;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $ranks = Rank::where('status', 0)->get();
        return view('Admin.ranks.index', compact('ranks'));
    }
	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param Rank $rank
	 * @param Balance $balance
	 * @return RedirectResponse
	 */
    public function update(Request $request, Rank $rank, Balance $balance): RedirectResponse
	{
		if ($rank->rank_name == 'officer') {
			$user = User::find($rank->user_id);
			$userRanks = Rank::where('user_id', $user->id)->where('status', 1)->get();

			foreach ($userRanks as $value){
				if ($value->rank_name == 'officer') {
					break;
				}
				else{
					$value->update([
						'status' => 2
					]);
				}
			}

			$rank->update([
				'status' => 1
			]);

			$user = User::find($rank->user_id);
			$currentGroupBalance = $user->balance->group_balance;


			$newBalance = $currentGroupBalance + 150;
			$balance->updateGroupBalance($rank->user_id, $newBalance);

			$user->addTransaction('group_balance', 'Credit', 150, $currentGroupBalance, $newBalance, 'Officer rank achievement bonus added.', $user->id);

			return back()->with('toast_success', 'Rank Approved Successfully!');
		}
		elseif($rank->rank_name == 'senior-officer'){


			$user = User::find($rank->user_id);
			$userRanks = Rank::where('user_id', $user->id)->where('status', 1)->get();

			foreach ($userRanks as $value){
				if ($value->rank_name == 'senior-officer') {
				    break;
				}
				else{
				    $value->update([
				    	'status' => 2
					]);
				}
			}

			$rank->update([
				'status' => 1
			]);

			$currentGroupBalance = $user->balance->group_balance;

			$newBalance = $currentGroupBalance + 1000;

			$user->updateGroupBalance($rank->user_id, $newBalance);

			$user->addTransaction('group_balance', 'Credit', 1000, $currentGroupBalance, $newBalance, 'Senior Officer rank achievement bonus added.', $user->id);

			return back()->with('toast_success', 'Rank Approved Successfully!');
		}
		elseif($rank->rank_name == 'manager'){
			$user = User::find($rank->user_id);
			$userRanks = Rank::where('user_id', $user->id)->where('status', 1)->get();

			foreach ($userRanks as $value){
				if ($value->rank_name == 'manager') {
				    break;
				}
				else{
				    $value->update([
				    	'status' => 2
					]);
				}
			}

			$rank->update([
				'status' => 1
			]);

			$user = User::find($rank->user_id);

			$currentGroupBalance = $user->balance->group_balance;

			$newBalance = $currentGroupBalance + 6500;

			$user->updateGroupBalance($rank->user_id, $newBalance);

			$user->addTransaction('group_balance', 'Credit', 6500, $currentGroupBalance, $newBalance, 'Manager rank achievement bonus added.', $user->id);

			return back()->with('toast_success', 'Rank Approved Successfully!');
		}
		elseif($rank->rank_name == 'senior-manager'){
			$user = User::find($rank->user_id);
			$userRanks = Rank::where('user_id', $user->id)->where('status', 1)->get();

			foreach ($userRanks as $value){
				if ($value->rank_name == 'senior-manager') {
				    break;
				}
				else{
				    $value->update([
				    	'status' => 2
					]);
				}
			}

			$rank->update([
				'status' => 1
			]);

			$user = User::find($rank->user_id);

			$currentGroupBalance = $user->balance->group_balance;

			$newBalance = $currentGroupBalance + 16000;

			$user->updateGroupBalance($rank->user_id, $newBalance);

			$user->addTransaction('group_balance', 'Credit', 16000, $currentGroupBalance, $newBalance, 'Senior Manager rank achievement bonus added.', $user->id);

			return back()->with('toast_success', 'Rank Approved Successfully!');
		}
		elseif($rank->rank_name == 'general-manager'){
			$user = User::find($rank->user_id);
			$userRanks = Rank::where('user_id', $user->id)->where('status', 1)->get();

			foreach ($userRanks as $value){
				if ($value->rank_name == 'general-manager') {
				    break;
				}
				else{
				    $value->update([
				    	'status' => 2
					]);
				}
			}

			$rank->update([
				'status' => 1
			]);

			$user = User::find($rank->user_id);

			$currentGroupBalance = $user->balance->group_balance;

			$newBalance = $currentGroupBalance + 100000;

			$user->updateGroupBalance($rank->user_id, $newBalance);

			$user->addTransaction('group_balance', 'Credit', 100000, $currentGroupBalance, $newBalance, 'General Manager rank achievement bonus added.', $user->id);

			return back()->with('toast_success', 'Rank Approved Successfully!');
		}
		elseif($rank->rank_name == 'director'){
			$user = User::find($rank->user_id);
			$userRanks = Rank::where('user_id', $user->id)->where('status', 1)->get();

			foreach ($userRanks as $value){
				if ($value->rank_name == 'director') {
				    break;
				}
				else{
				    $value->update([
				    	'status' => 2
					]);
				}
			}

			$rank->update([
				'status' => 1
			]);

			$user = User::find($rank->user_id);

			$currentGroupBalance = $user->balance->group_balance;

			$newBalance = $currentGroupBalance + 250000;

			$user->updateGroupBalance($rank->user_id, $newBalance);

			$user->addTransaction('group_balance', 'Credit', 250000, $currentGroupBalance, $newBalance, 'Director rank achievement bonus added.', $user->id);

			return back()->with('toast_success', 'Rank Approved Successfully!');
		}
		elseif($rank->rank_name == 'senior-director'){
			$user = User::find($rank->user_id);
			$userRanks = Rank::where('user_id', $user->id)->where('status', 1)->get();

			foreach ($userRanks as $value){
				if ($value->rank_name == 'senior-director') {
				    break;
				}
				else{
				    $value->update([
				    	'status' => 2
					]);
				}
			}

			$rank->update([
				'status' => 1
			]);

			$user = User::find($rank->user_id);

			$currentGroupBalance = $user->balance->group_balance;

			$newBalance = $currentGroupBalance + 600000;

			$user->updateGroupBalance($rank->user_id, $newBalance);

			$user->addTransaction('group_balance', 'Credit', 600000, $currentGroupBalance, $newBalance, 'Senior Director rank achievement bonus added.', $user->id);

			return back()->with('toast_success', 'Rank Approved Successfully!');
		}

    }
}
