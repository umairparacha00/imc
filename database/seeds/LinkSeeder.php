<?php

	use App\Link;
	use Illuminate\Database\Seeder;

	class LinkSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			factory(Link::class, 100)->create();
			factory(Link::class, 100)->create(['link_type' => 'Instagram']);
			factory(Link::class, 100)->create(['link_type' => 'Facebook']);
		}
	}
