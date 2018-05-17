<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('client_service', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('client_id')->unsigned()->nullable();
        //     $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        //     $table->integer('service_id')->unsigned()->nullable();
        //     $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        //     $table->boolean('cs_start_active')->comment('Czy usługa jest aktywna');
        //     $table->date('cs_start_datefirst')->comment('data wystartowania usługi');

        //     $table->timestamps();
        // });

        Schema::create('client_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->nullable();

            $table->integer('service_id')->unsigned()->nullable();;

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('service_id')->references('id')->on('services');

            $table->boolean('cs_start_active')->comment('Czy usługa jest aktywna');
            $table->date('cs_start_datefirst')->comment('data wystartowania usługi');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_service');
    }
}
