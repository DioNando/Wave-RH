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
        Schema::create('document_administratifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')->constrained('collaborateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('type_document_id')->constrained('type_documents')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date_emission')->format('Y-m-d')->nullable();
            $table->date('date_expiration')->format('Y-m-d');
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
        Schema::dropIfExists('document_administratifs');
    }
};
