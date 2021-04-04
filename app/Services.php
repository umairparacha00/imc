<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Services extends Model
{
	public function orders(): HasMany
	{
		return $this->hasMany(Orders::class);
    }

	public function paymentGateway(): HasOne
	{
		return $this->hasOne(PaymentGateway::class);
	}
}
