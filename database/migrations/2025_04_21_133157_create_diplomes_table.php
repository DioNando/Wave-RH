<?php

use App\Enums\DiplomeNiveau;
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
        Schema::create('diplomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')->constrained('collaborateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('titre', 255);
            $table->string('etablissement', 255)->nullable();
            $table->foreignId('pays_id')->nullable()->constrained('pays')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date_obtention')->format('Y-m-d')->nullable();
            $table->enum('niveau', array_column(DiplomeNiveau::cases(), 'value'))->nullable();
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
        Schema::dropIfExists('diplomes');
    }
};
