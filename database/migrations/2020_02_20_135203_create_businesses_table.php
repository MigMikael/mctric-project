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
            $table->string("client")->default("")->nullable();
            $table->string("consultant")->default("")->nullable();
            $table->string("designer")->default("")->nullable();
            $table->string("constructor")->default("")->nullable();
            $table->string("contract_value")->default("")->nullable();
            $table->string("contract_period")->default("")->nullable();
            $table->text("scope_of_work")->default("")->nullable();

            $table->string('slug')->default("");        // for url convert from name
            $table->string('category')->default("");    // MechanicalElectrical, CivilConstruction, UtilityPipeline, RenewEnergy, SupplyChain
            $table->string('status')->default("");      // OnGoing, InProcess, Complete
            $table->boolean('display')->default(false); // show or not show
            $table->integer('image');
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
