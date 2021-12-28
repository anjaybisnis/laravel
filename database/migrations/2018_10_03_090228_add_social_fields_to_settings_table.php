<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialFieldsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
              $table->string('social_behance')->nullable();
              $table->string('social_digg')->nullable();
              $table->string('social_facebook')->nullable();
              $table->string('social_github')->nullable();
              $table->string('social_lastfm')->nullable();
              $table->string('social_reddit')->nullable();
              $table->string('social_thumblr')->nullable();
              $table->string('social_vimeo')->nullable();
              $table->string('social_devianart')->nullable();
              $table->string('social_dribble')->nullable();
              $table->string('social_flickr')->nullable();
              $table->string('social_google')->nullable();
              $table->string('social_linkedin')->nullable();
              $table->string('social_soundcloud')->nullable();
              $table->string('social_twitter')->nullable();
              $table->string('social_youtube')->nullable();
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
