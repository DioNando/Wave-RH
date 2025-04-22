<?php

use App\Enums\TypeFormation;
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
        Schema::create('historique_formations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')->constrained('collaborateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('titre', 255);
            $table->string('organisme', 255)->nullable();
            $table->enum('type_formation', array_column(TypeFormation::cases(), 'value'));
            $table->date('date_debut')->format('Y-m-d');
            $table->date('date_fin')->format('Y-m-d')->nullable();
            $table->text('resultat')->nullable();
            $table->text('commentaires')->nullable();
            $table->string('document_path', 255)->nullable();
            $table->boolean('statut')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_formations');
    }
};
