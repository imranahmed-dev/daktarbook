<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id')->nullable();
            $table->string('doctor_name');
            $table->string('gender');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('specialist_id');
            $table->string('degree');
            $table->string('designation');
            $table->string('hospital_name');
            $table->string('bmdc_no');
            $table->string('mobile_one');
            $table->string('mobile_two')->nullable();
            $table->string('email')->nullable();
            $table->longText('chamber_details');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();

            $table->string('status')->nullable()->comment('1 = pending, 2 = approved, 3 = reject');
            $table->softDeletes();
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
        Schema::dropIfExists('doctors');
    }
}
