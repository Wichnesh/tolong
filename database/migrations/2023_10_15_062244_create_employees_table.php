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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->unsignedBigInteger('employer_id');
            $table->integer('sector_id')->nullable();
            $table->string('emp_fname')->nullable();
            $table->string('emp_lname')->nullable();
            $table->string('emp_mname')->nullable();
            $table->string('emp_dob')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_is_date')->nullable();
            $table->string('passport_ex_date')->nullable();
            $table->string('workpass_yr')->nullable();
            $table->string('sticker_number')->nullable();
            $table->string('workpass_is_date')->nullable();
            $table->string('workpass_ex_date')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
