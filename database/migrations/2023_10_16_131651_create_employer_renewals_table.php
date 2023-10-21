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
        Schema::create('employer_renewals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->unsignedBigInteger('employer_id');
            $table->string('renewal_date')->nullable();
            $table->string('renewal_expiry_date')->nullable();
            $table->string('visa_type')->nullable();
            $table->string('visa-status')->nullable();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('employer_renewals');
    }
};
