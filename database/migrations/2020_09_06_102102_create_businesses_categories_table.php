<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('business_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();

            $table->foreign('business_id')
                ->references('id')
                ->on('businesses');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses_categories');
    }
}
