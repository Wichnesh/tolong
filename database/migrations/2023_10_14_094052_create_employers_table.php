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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('emp_address')->nullable();
            $table->string('emp_phone')->nullable();
            $table->string('passport_issue')->nullable();
            $table->string('passport_expire')->nullable();
            $table->string('emp_lic')->nullable();
            $table->string('emp_per_code')->nullable();
            $table->string('qute_count')->nullable();
            $table->string('sectors_ids')->nullable();
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
        Schema::dropIfExists('employers');
    }
};
