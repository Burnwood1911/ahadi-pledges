<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('pledge_id');
            $table->unsignedInteger('payment_method_id');
            $table->decimal('amount');
            $table->dateTime('payment_date');
            $table->timestamps();
            $table->foreign('pledge_id')->references('id')->on('pledges')
            ->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')
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
        Schema::dropIfExists('payments');
    }
};
