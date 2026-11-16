<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThaiFieldsToManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('managements', function (Blueprint $table) {
            $table->string('first_name_th')->nullable();
            $table->string('last_name_th')->nullable();
            $table->string('job_title_th')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('managements', function (Blueprint $table) {
            $table->dropColumn('first_name_th');
            $table->dropColumn('last_name_th');
            $table->dropColumn('job_title_th');
        });
    }
}
