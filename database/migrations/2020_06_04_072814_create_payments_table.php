<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->integer('user_id')->unsigned();
            $table->string('nama');
            $table->string('email');
            $table->text('address');
            $table->text('note')->nullable();
            $table->string('city_id');
            $table->integer('phone');
            $table->string('status')->default('pending');
            $table->double('amount',20,2)->unsigned();
            $table->string('snap_token');
            
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
        Schema::dropIfExists('payments');
    }
}
