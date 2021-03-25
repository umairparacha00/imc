<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;

	class FollowedLinks extends Model
	{
		protected $guarded = [];


		public function link(): BelongsTo
		{
			return $this->belongsTo(Link::class);
		}

		public function user()
		{
			$this->belongsTo(User::class);
		}

	}
