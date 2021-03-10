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
		factory(Rate::class)->create(['name' => 'pin_refund', 'rate' => 0.1]);
		factory(Rate::class)->create(['name' => 'profit_percentage', 'rate' => 0.30]);
		factory(Rate::class)->create(['name' => 'sunday_earning_percentage', 'rate' => 0.12]);
		factory(Rate::class)->create(['name' => 'investment_percentage', 'rate' => 0.3]);
		factory(Rate::class)->create(['name' => 'exchanger_balance_sharing', 'rate' => 0.01]);
		factory(Rate::class)->create(['name' => 'balance_sharing', 'rate' => 2.6]);
		factory(Rate::class)->create(['name' => 'group_balance_sharing', 'rate' => 0.50]);
		factory(Rate::class)->create(['name' => 'group_balance_sharing', 'rate' => 0.50]);
		factory(Rate::class)->create(['name' => 'direct_commission', 'rate' => 5]);
		factory(Rate::class)->create(['name' => 'indirect_commission', 'rate' => 0.5]);
		factory(Rate::class)->create(['name' => 'membership_commission', 'rate' => 20]);
		factory(Rate::class)->create(['name' => 'officer_leg', 'rate' => 2082]);
		factory(Rate::class)->create(['name' => 'senior_officer_leg', 'rate' => 8328]);
		factory(Rate::class)->create(['name' => 'manager_leg', 'rate' => 33312]);
		factory(Rate::class)->create(['name' => 'senior_manager_leg', 'rate' => 133248]);
		factory(Rate::class)->create(['name' => 'general_manager_leg', 'rate' => 532992]);
		factory(Rate::class)->create(['name' => 'director_leg', 'rate' => 2131968]);
		factory(Rate::class)->create(['name' => 'senior_director_leg', 'rate' => 8527872]);
		factory(Rate::class)->create(['name' => 'partner_leg', 'rate' => 34111488]);
		factory(Rate::class)->create(['name' => 'officer_salary', 'rate' => 10]);
		factory(Rate::class)->create(['name' => 'senior_officer_salary', 'rate' => 40]);
		factory(Rate::class)->create(['name' => 'manager_salary', 'rate' => 150]);
		factory(Rate::class)->create(['name' => 'senior_manager_salary', 'rate' => 400]);
		factory(Rate::class)->create(['name' => 'general_manager_salary', 'rate' => 1000]);
		factory(Rate::class)->create(['name' => 'director_salary', 'rate' => 1500]);
		factory(Rate::class)->create(['name' => 'senior_director_salary', 'rate' => 2500]);
		factory(Rate::class)->create(['name' => 'partner_salary', 'rate' => 4500]);

    }
}
