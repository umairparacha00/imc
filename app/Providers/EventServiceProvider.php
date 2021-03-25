<?php

namespace App\Providers;

use App\Events\MembershipPurchased;
use App\Listeners\LogVerifiedUser;
use App\Listeners\MembershipCommission;
use App\Listeners\RankUpdater;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
		Verified::class => [
			LogVerifiedUser::class,
		],
		MembershipPurchased::class =>[
			MembershipCommission::class,
		],
//		Login::class => [
//			RankUpdater::class,
//		]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
