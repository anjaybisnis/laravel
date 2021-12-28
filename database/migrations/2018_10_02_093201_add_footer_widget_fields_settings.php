<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFooterWidgetFieldsSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
          $table->string('fwtitle1')->nullable();
          $table->longText('fwcon1')->nullable();
          $table->string('fwtitle2')->nullable();
          $table->longText('fwcon2')->nullable();
          $table->string('fwtitle3')->nullable();
          $table->longText('fwcon3')->nullable();
          $table->string('fwtitle4')->nullable();
          $table->longText('fwcon4')->nullable();
          $table->string('fwtitle5')->nullable();
          $table->longText('fwcon5')->nullable();

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
