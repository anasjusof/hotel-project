<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactEmailAndRemarksOnBookingHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_histories', function (Blueprint $table) {
            $table->string('contact_email');
            $table->longText('remarks');
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
            $table->dropColumn('contact_email');
            $table->dropColumn('remarks');
        });
    }
}
