<?php

	use App\Membership;
	use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Membership::class)->create();
		factory(Membership::class)->create(['name' => 'Joining', 'price' => 3]);
		factory(Membership::class)->create(['name' => 'Basic', 'price' => 7]);
		factory(Membership::class)->create(['name' => 'Silver', 'price' => 15]);
		factory(Membership::class)->create(['name' => 'Gold', 'price' => 30]);
    }
}
