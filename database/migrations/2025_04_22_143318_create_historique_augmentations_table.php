<?php

use App\Enums\Monnaie;
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
        Schema::create('historique_augmentations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')->constrained('collaborateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date_augmentation')->format('Y-m-d');
            $table->decimal('ancien_salaire', 10, 2);
            $table->decimal('nouveau_salaire', 10, 2);
            $table->enum('monnaie', array_column(Monnaie::cases(), 'value'));
            $table->decimal('pourcentage', 5, 2);
            $table->text('motif')->nullable();
            $table->text('commentaires')->nullable();
            $table->boolean('statut')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_augmentations');
    }
};
