<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id');
			$table->string('balance_field');
			$table->string('credit_debit');
			$table->decimal('transaction_amount', 25, 10);
			$table->decimal('old_balance', 25, 10);
			$table->decimal('new_balance', 25, 10);
			$table->longText('transactions_details');
			$table->timestamp('trans_date_time');
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
