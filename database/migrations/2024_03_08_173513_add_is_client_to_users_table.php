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
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->string('phone_number')->nullable(); // Add phone_number column
            $table->string('codeLogin')->nullable(); // Add codeLogin column
            $table->string('specialisation')->nullable(); // Add specialisation column
            $table->boolean('isClient')->default(false); // Add isClient column
            $table->boolean('isAdmin')->default(false); // Add isAdmin column
            $table->boolean('isMechanic')->default(false); // Add isMechanic column
            $table->string('address')->nullable(); // Add address column
            $table->string('city')->nullable(); // Add city column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'codeLogin', 'specialisation', 'isClient', 'isAdmin', 'isMechanic', 'address', 'city', 'image']);
        });
    }
};
