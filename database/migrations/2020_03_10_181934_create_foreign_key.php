<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('payment_id')->references('id')->on('payment');
        });

        Schema::table('payment', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('invoice_id')->references('id')->on('invoice');
        });

        Schema::table('session', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
