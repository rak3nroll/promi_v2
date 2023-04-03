<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promisorris', function (Blueprint $table) {
            $table->id();
            $table->string('consumer_name');
            $table->string('consumer_address');
            $table->string('consumer_contact');
            $table->string('account_no');
            $table->string('no_of_bills');
            $table->string('total_balance');
            $table->string('partial_payment');
            $table->string('total_amount');
            $table->string('months_to_pay');
            $table->string('per_month');
            $table->date('start_date');
            $table->date('exp_date');
            $table->string('recon_fee');
            $table->string('tr_no_recon');
            $table->string('surcharge');
            $table->string('tr_no_surcharge');
            $table->string('remarks');
            $table->string('is_verified');
            $table->string('is_approve');
            $table->string('is_posted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promisorris');
    }
};
