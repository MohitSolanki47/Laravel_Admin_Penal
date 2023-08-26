<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('Receipt_No');
            $table->string('Donor_Name');
            $table->string('Donor_Mobile');
            $table->string('Donor_Pan_No');
            $table->string('Donor_Email');
            $table->string('Donor_Address');
            $table->string('Amount');
            $table->string('Payment_Method');
            $table->string('Extra');
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
        Schema::dropIfExists('receipts');
    }
}
