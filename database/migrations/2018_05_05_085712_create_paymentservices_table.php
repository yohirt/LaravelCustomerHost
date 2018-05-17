<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentservices', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('client_service_id')->unsigned();
            $table->foreign('client_service_id')->references('id')->on('client_service');

            $table->float('payment_amount', 8, 2);
            $table->date('date_period');
            $table->boolean('is_paid');

            $table->dateTimeTz('date_payment');
            $table->timestamps();
            $table->primary(['client_service_id', 'date_period']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paymentservices');
    }
}
