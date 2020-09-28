<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('misions', function (Blueprint $table) {
           $table->bigIncrements('id');
             $table->bigInteger('type_mission_id')->unsigned();
            $table->foreign('type_mission_id')
                  ->references('id')
                  ->on('type_missions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                   $table->bigInteger('categorie_mission_id')->unsigned();
            $table->foreign('categorie_mission_id')
                  ->references('id')
                  ->on('categorie_missions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->bigInteger('moyen_transport_id')->unsigned();
            $table->foreign('moyen_transport_id')
                  ->references('id')
                  ->on('moyen_transports')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

                  $table->bigInteger('mode_paiement_id')->unsigned();
            $table->foreign('mode_paiement_id')
                  ->references('id')
                  ->on('mode_paiements')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->bigInteger('fonction_id')->unsigned();
            $table->foreign('fonction_id')
                  ->references('id')
                  ->on('fonctions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->bigInteger('annee_mission_id')->unsigned();
            $table->foreign('annee_mission_id')
                  ->references('id')
                  ->on('annee_missions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->bigInteger('personnel_id')->unsigned();
            $table->foreign('personnel_id')
                  ->references('id')
                  ->on('personnels')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

              $table->string('objet_mission');
              $table->date('date_mission');
              $table->string('destination');
              $table->string('iteneraire_retnu');
              $table->string('classe_voyage');
              $table->integer('fraire_restauration');
              $table->integer('fraire_herbegement');
              $table->integer('autre_fraire');
              $table->float('cout_total');
              $table->integer('cout_billet_avion');
              $table->date('date_depart');
              $table->date('date_retour');
              $table->integer('duree');
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
        Schema::dropIfExists('misions');
    }
}
