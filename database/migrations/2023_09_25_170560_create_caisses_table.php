<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisses', function (Blueprint $table) {
            $table->id();
            $table->string('nom_caisse')->default('caisse');
            $table->integer('montant_caisse')->nullable();
            $table->decimal('taux_caisse');
            $table->unsignedBigInteger('operateur_id');
            $table->unsignedBigInteger('abonnement_id');
            $table->foreign('operateur_id')->references('id')->on('operateurs')->onDelete('cascade');
            $table->foreign('abonnement_id')->references('id')->on('abonnements')->onDelete('cascade');
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
        Schema::dropIfExists('caisses');
    }
};
