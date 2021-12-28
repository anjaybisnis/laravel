<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->increments('item_id');

            $table->string('item_name');
            $table->string('keyfeature1')->nullable();
            $table->string('keyfeature2')->nullable();
            $table->longText('description')->nullable();

            $table->string('thumbnail')->nullable();
            $table->string('preview')->nullable();
            $table->string('mainfile')->nullable();
            $table->string('wptheme')->nullable();

            $table->string('category')->nullable();
            $table->string('high_resulation')->nullable();
            $table->string('widget_ready')->nullable();
            $table->string('compatible_browser')->nullable();
            $table->string('compatible_width')->nullable();
            $table->string('framework')->nullable();
            $table->string('software_version')->nullable();
            $table->string('files_included')->nullable();
            $table->string('columns')->nullable();
            $table->string('layout')->nullable();
            $table->longText('demo_url')->nullable();
            $table->longText('tags')->nullable();

            $table->decimal('item_price')->nullable();
            $table->decimal('item_buyerfee')->nullable();
            $table->decimal('item_purchasefee')->nullable();
            $table->decimal('item_ex_price')->nullable();
            $table->decimal('item_ex_buyerfee')->nullable();
            $table->decimal('item_ex_purchasefee')->nullable();

            $table->longText('item_message')->nullable();

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
        Schema::dropIfExists('items');
    }
}
