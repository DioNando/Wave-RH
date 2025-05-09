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
        Schema::create('collaborateur_competence_techniques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')
                ->constrained('collaborateurs')
                ->onDelete('cascade')
                ->name('collab_comp_tech_collab_id_foreign');
            $table->foreignId('competence_technique_id')
                ->constrained('competence_techniques')
                ->onDelete('cascade')
                ->name('collab_comp_tech_comp_id_foreign');
            $table->integer('niveau')->default(1)->comment('Niveau de 1 à 5');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborateur_competence_techniques');
    }
};
