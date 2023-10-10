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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('montant')->default(0);
            $table->longText('details')->nullable();
            $table->dateTime('dateHeure');
            $table->string('type')->nullable();
            $table->integer('frais')->default(0);
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('caisse_id');
            $table->unsignedBigInteger('abonnement_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('caisse_id')->references('id')->on('caisses')->onDelete('cascade');
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
        Schema::dropIfExists('transactions');
    }
};
