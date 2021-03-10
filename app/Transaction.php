<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' => 'integer',
		'user_id' => 'integer',
	];


	public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function createTransaction($user_id, $creditOrDebit, $amount, $newBalance, $oldBalance, $transactionsDetails, $balanceField )
	{
		Transaction::create([
			'user_id' => $user_id,
			'balance_field' => $balanceField,
			'credit_debit' => $creditOrDebit,
			'transaction_amount' => $amount,
			'old_balance' => $oldBalance,
			'new_balance' => $newBalance,
			'transactions_details' => $transactionsDetails,
			'trans_date_time' => now(),
		]);
	}
}
