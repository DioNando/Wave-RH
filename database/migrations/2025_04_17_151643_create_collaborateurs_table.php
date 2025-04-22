<?php

use App\Enums\CollaborateurGenre;
use App\Enums\CollaborateurStatutMarital;
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
        Schema::create('collaborateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255);
            $table->string('prenom', 255)->default(null);
            $table->string('photo_profil', 255)->nullable();
            $table->enum('genre', array_column(CollaborateurGenre::cases(), 'value'));
            $table->date('date_naissance')->nullable();
            $table->foreignId('lieu_naissance_id')->nullable()->constrained('villes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pays_id')->nullable()->constrained('pays')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('statut_marital', array_column(CollaborateurStatutMarital::cases(), 'value'));
            $table->integer('nombre_enfants')->default(0);
            $table->string('cin', 50)->unique()->nullable();
            $table->string('cnss', 50)->unique()->nullable();
            $table->string('email_professionnel', 255)->unique()->nullable();
            $table->string('email_personnel', 255)->unique()->nullable();
            $table->string('telephone_professionnel', 20)->unique()->nullable();
            $table->string('telephone_personnel', 20)->unique()->nullable();
            $table->text('adresse_complete')->nullable();
            $table->foreignId('ville_id')->constrained('villes')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date_embauche')->nullable();
            $table->string('matricule_interne', 50)->unique()->nullable();
            $table->integer('solde_conge')->default(0);
            // $table->string('document_cv', 255)->nullable();
            $table->json('langues')->nullable();
            $table->json('competences_techniques')->nullable();
            $table->text('situation_medicale')->nullable();
            $table->text('notes_diverses')->nullable();
            $table->boolean('statut')->default(1);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborateurs');
    }
};
