<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * customern the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->string('customer_email');
            $table->string('customer_username');
            $table->string('customer_address')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('password');
            $table->string('customer_user_type');
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
