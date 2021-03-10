<?php


	namespace App;

	trait Bbalance
	{
		public function currentMainBalance()
		{
			$freshBalance = current_user()->balance->fresh();
			return $freshBalance->main_balance;
		}

		public function currentAdPackBalance()
		{
			$freshBalance = current_user()->balance->fresh();
			return $freshBalance->ad_power_balance;
		}

		public function currentInvestmentAdPackBalance()
		{
			$freshBalance = current_user()->balance->fresh();
			return $freshBalance->current_ad_power_balance;
		}

		public function totalInvestment()
		{
			$balance = Balance::all();
			return $balance->sum('ad_power_balance');
		}

		public function currentGroupBalance()
		{
			$freshBalance = current_user()->balance->fresh();
			return $freshBalance->group_balance;
		}

		public function currentMallBalance()
		{
			$freshBalance = current_user()->balance->fresh();
			return $freshBalance->mall_balance;
		}

		public function updateGroupBalance($id, $amount)
		{
			Balance::where('user_id', $id)->update([
				'group_balance' => $amount
			]);
		}

		public function updateMainBalance($id, $amount)
		{
			Balance::where('user_id', $id)->update([
				'main_balance' => $amount
			]);
		}

		public function totalMainBalance()
		{
			$mainBalance = Balance::all();
			return $mainBalance->sum('main_balance');
		}


		public function totalGroupBalance()
		{
			$mainBalance = Balance::all();
			return $mainBalance->sum('group_balance');
		}

		public function updateAdPackBalance($id, $amount)
		{
			Balance::where('user_id', $id)->update([
				'ad_power_balance' => $amount
			]);
		}

		public function updateCurrentAdPackBalance($id, $amount)
		{
			Balance::where('user_id', $id)->update([
				'current_ad_power_balance' => $amount
			]);
		}
	}