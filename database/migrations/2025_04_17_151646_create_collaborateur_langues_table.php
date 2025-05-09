<?php

use App\Enums\LangueNiveau;
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
        Schema::create('collaborateur_langues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborateur_id')
                ->constrained('collaborateurs')
                ->onDelete('cascade')
                ->name('collab_lang_collab_id_foreign');
            $table->foreignId('langue_id')
                ->constrained('langues')
                ->onDelete('cascade')
                ->name('collab_lang_langue_id_foreign');
            $table->enum('niveau', array_column(LangueNiveau::cases(), 'value'))->default(LangueNiveau::INTERMEDIAIRE->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborateur_langues');
    }
};
