<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHomeLogingSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
          $table->string('hppbheading')->nullable();
          $table->string('hpbstext')->nullable();
          $table->string('hpbbtext')->nullable();
          $table->string('hpburl')->nullable();
          $table->string('hpbfiadis')->nullable();
          $table->string('hpbliadis')->nullable();
          $table->string('hpbfreeiadis')->nullable();
          $table->string('hpbatadis')->nullable();
          $table->string('hpfbhtext')->nullable();
          $table->string('hpfbstext')->nullable();
          $table->string('hpfbbtext')->nullable();
          $table->string('hpfbburl')->nullable();
          $table->string('lpheading')->nullable();
          $table->string('lptext')->nullable();
          $table->string('lpbtext')->nullable();
          $table->string('lpburl')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
