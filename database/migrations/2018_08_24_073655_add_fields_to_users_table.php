<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('companyname')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('town')->nullable();
            $table->string('district')->nullable();
            $table->string('postcode')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();

            $table->string('noti_rating')->nullable();
            $table->string('noti_itemupdate')->nullable();
            $table->string('noti_itemcomment')->nullable();
            $table->string('noti_teamcomment')->nullable();
            $table->string('noti_dailysummary')->nullable();
            $table->string('noti_itemreview')->nullable();
            $table->string('noti_buyerreview')->nullable();
            $table->string('noti_expiring')->nullable();

            $table->string('card_number')->nullable();
            $table->string('card_holder')->nullable();
            $table->string('card_expire')->nullable();
            $table->string('card_cvv')->nullable();

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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
