<?php

use App\Enums\Monnaie;
use App\Enums\TypePrime;
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
        Schema::create('historique_primes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')->constrained('collaborateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date_prime')->format('Y-m-d');
            $table->enum('type_prime', array_column(TypePrime::cases(), 'value'));
            $table->decimal('montant', 10, 2);
            $table->enum('monnaie', array_column(Monnaie::cases(), 'value'));
            $table->text('motif')->nullable();
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
        Schema::dropIfExists('historique_primes');
    }
};
