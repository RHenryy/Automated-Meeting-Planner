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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->references("id")->on("employees");
            $table->boolean("mondayAm");
            $table->boolean("mondayPm");
            $table->boolean("tuesdayAm");
            $table->boolean("tuesdayPm");
            $table->boolean("wednesdayAm");
            $table->boolean("wednesdayPm");
            $table->boolean("thursdayAm");
            $table->boolean("thursdayPm");
            $table->boolean("fridayAm");
            $table->boolean("fridayPm");
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shifts');
    }
};
