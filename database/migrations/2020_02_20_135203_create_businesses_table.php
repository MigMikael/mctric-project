<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string("name")->default("");
            $table->text("description")->default("")->nullable();
            $table->string("client")->default("")->nullable();
            $table->string("consultant")->default("")->nullable();
            $table->string("designer")->default("")->nullable();
            $table->string("contractor")->default("")->nullable();
            $table->string("main_contractor")->default("")->nullable();
            $table->string("contract_value")->default("")->nullable();
            $table->text("scope_of_work")->default("")->nullable();

            $table->string('slug')->default("");        // for url convert from name
            $table->string('category')->default("");    // MechanicalElectrical, CivilConstruction, UtilityPipeline, RenewEnergy, SupplyChain
            $table->string('status')->default("");      // OnGoing, InProcess, Complete
            $table->string('completion')->default("")->nullable();
            $table->boolean('display')->default(false); // show or hide
            $table->integer('cover_image');

            $table->text("social_facebook")->default("")->nullable();
            $table->text("social_youtube")->default("")->nullable();
            $table->text("social_instagram")->default("")->nullable();

            $table->date("contract_start")->default(\Carbon\Carbon::now())->nullable();
            $table->date("contract_end")->default(\Carbon\Carbon::now())->nullable();
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
        Schema::dropIfExists('businesses');
    }
}
