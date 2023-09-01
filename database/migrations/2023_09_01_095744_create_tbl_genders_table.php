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
        Schema::create('tbl_genders', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->unsignedBigInteger('patient_id');

            $table->foreign('patient_id')->references('id')->on('tbl_patients')->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('tbl_genders');
    }
};
