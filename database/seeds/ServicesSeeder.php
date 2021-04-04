<?php

	use App\Services;
	use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Services::class)->create();
		factory(Services::class)->create(['name' => '4k_hours_youtube_watchtime', 'price' => 3]);
		factory(Services::class)->create(['name' => 'youtube_monetization_package', 'price' => 7]);
		factory(Services::class)->create(['name' => '1k_facebook_followers', 'price' => 15]);
		factory(Services::class)->create(['name' => '1k_instagram_followers', 'price' => 15]);
		factory(Services::class)->create(['name' => '1k_youtube_subscribers', 'price' => 30]);
    }
}
