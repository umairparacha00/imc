<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMembership extends Model
{
	public function upgradeMembership($user_id, $membershipId)
	{
		UserMembership::where('user_id', $user_id)->update([
			'membership_id' => $membershipId,
			'expires_at' =>  Carbon::today()->addMonths(2),
			'status' => 1,
		]);
	}
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
