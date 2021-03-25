<?php

	use App\PaymentGateway;
	use Illuminate\Database\Seeder;

	class PaymentGatewaySeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			factory(PaymentGateway::class)->create();
			factory(PaymentGateway::class)->create(
				[
					'name' => 'BTC',
					'bank_name' => null,
					'bank_branch_code' => null,
					'account_holder_name' => null,
					'account_iban' => 'fasdkfjklsdghfkjasdhfkjasd98klasdfhoiuy239yhsarfy89q234yrosdyf9q823',
					'reference_number' => null
				]
			);
			factory(PaymentGateway::class)->create(
				[
					'name' => 'Jazzcash',
					'bank_name' => null,
					'bank_branch_code' => null,
					'account_holder_name' => 'Muhammad Umair Raza',
					'account_iban' => '03068497074',
					'reference_number' => null
				]
			);
			factory(PaymentGateway::class)->create(
				[
					'name' => 'Easypaisa',
					'bank_name' => null,
					'bank_branch_code' => null,
					'account_holder_name' => 'Muhammad Umair Raza',
					'account_iban' => '03068497074',
					'reference_number' => null
				]
			);

			factory(PaymentGateway::class)->create(
				[
					'name' => 'Bank',
					'bank_name' => 'UBL Bank',
					'bank_branch_code' => '0403',
					'account_holder_name' => 'Muhammad Umair Raza',
					'account_iban' => 'PK097809845907809809809',
					'reference_number' => '03068497074'
				]
			);
		}
	}
