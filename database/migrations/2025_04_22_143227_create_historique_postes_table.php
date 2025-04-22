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
        Schema::create('historique_postes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')->constrained('collaborateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('poste_id')->constrained('postes')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date_debut')->format('Y-m-d');
            $table->date('date_fin')->format('Y-m-d')->nullable();
            $table->text('commentaires')->nullable();
            $table->text('raison_fin')->nullable();
            $table->boolean('statut')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_postes');
    }
};
