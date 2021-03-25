<?php

	use App\Rate;
	use Illuminate\Database\Seeder;

	class RateSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			factory(Rate::class)->create();
			factory(Rate::class)->create(['name' => 'membership_indirect_commission', 'rate' => 0.5]);
			factory(Rate::class)->create(['name' => 'membership_commission', 'rate' => 20]);

			factory(Rate::class)->create(['name' => 'joining_membership_subscriber', 'rate' => 0.0017]);
			factory(Rate::class)->create(['name' => 'basic_membership_subscriber', 'rate' => 0.0029]);
			factory(Rate::class)->create(['name' => 'silver_membership_subscriber', 'rate' => 0.0058]);
			factory(Rate::class)->create(['name' => 'gold_membership_subscriber', 'rate' => 0.0087]);

			factory(Rate::class)->create(['name' => 'joining_membership_instagram_follower', 'rate' => 0.0017]);
			factory(Rate::class)->create(['name' => 'basic_membership_instagram_follower', 'rate' => 0.0017]);
			factory(Rate::class)->create(['name' => 'silver_membership_instagram_follower', 'rate' => 0.0017]);
			factory(Rate::class)->create(['name' => 'gold_membership_instagram_follower', 'rate' => 0.0017]);

			factory(Rate::class)->create(['name' => 'joining_membership_facebook_follower', 'rate' => 0.0017]);
			factory(Rate::class)->create(['name' => 'basic_membership_facebook_follower', 'rate' => 0.0017]);
			factory(Rate::class)->create(['name' => 'silver_membership_facebook_follower', 'rate' => 0.0017]);
			factory(Rate::class)->create(['name' => 'gold_membership_facebook_follower', 'rate' => 0.0017]);

		}
	}
