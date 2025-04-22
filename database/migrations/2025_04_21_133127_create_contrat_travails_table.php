<?php

use App\Enums\TypeContratTravail;
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
        Schema::create('contrat_travails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')->constrained('collaborateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('type_contrat', array_column(TypeContratTravail::cases(), 'value'));
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->decimal('salaire', 10, 2)->nullable();
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
        Schema::dropIfExists('contrat_travails');
    }
};
