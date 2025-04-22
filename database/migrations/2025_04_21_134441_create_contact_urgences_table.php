<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_urgences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')->constrained('collaborateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nom', 255);
            $table->string('relation', 255)->nullable();
            $table->string('telephone', 20);
            $table->string('email', 255)->nullable();
            $table->text('adresse_complete')->nullable();
            $table->foreignId('ville_id')->constrained('villes')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('statut')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_urgences');
    }
};
