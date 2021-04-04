<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;

	class Orders extends Model
	{
		/**
		 * @var array
		 */
		protected $guarded = [];

		public function user(): BelongsTo
		{
			return $this->belongsTo(User::class);
		}

		public function paymentGateway(): BelongsTo
		{
			return $this->belongsTo(PaymentGateway::class);
		}

		public function service(): BelongsTo
		{
			return $this->belongsTo(Services::class);
		}
	}
