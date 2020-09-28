<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_activites', function (Blueprint $table) {
              $table->bigIncrements('id');
            $table->string('code');
            $table->string('libelle');
             $table->bigInteger('activite_id')->unsigned();
            $table->foreign('activite_id')
                  ->references('id')
                  ->on('activites')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('plan_activites');
    }
}
