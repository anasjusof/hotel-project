<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactOnBookin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_histories', function (Blueprint $table) {
            $table->string('contact_name');
            $table->string('contact_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_histories', function (Blueprint $table) {
            $table->dropColumn('contact_name');
            $table->dropColumn('contact_number');
        });
    }
}
