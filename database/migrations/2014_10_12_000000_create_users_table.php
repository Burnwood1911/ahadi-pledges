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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('jumuiya_id');
            $table->unsignedInteger('card_id')->nullable();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('last_name');
            $table->string('profile_picture')->nullable();
            $table->string('email')->unique();
            $table->dateTime('date_of_birth');
            $table->string('gender');
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('enabled')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('cascade');
            $table->foreign('card_id')->references('id')->on('cards')
                ->onDelete('cascade');
            $table->foreign('jumuiya_id')->references('id')->on('jumuiyas')
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
        Schema::dropIfExists('users');
    }
};
