<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentGateway extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	public function pendingMemberships(): HasMany
	{
		return $this->hasMany(PendingMembership::class);
	}

	public function withdraws(): HasMany
	{
		return $this->hasMany(Withdraw::class);
	}

}
