<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70)->comment('Nombre completo');
            $table->string('email', 100)->comment('Correo electrónico');
            $table->string('phone', 20)->comment('Teléfono');
            $table->text('comments')->comment('Comentarios');
            $table->boolean('is_read')->default(false)->comment('¿Ya fue leído?');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
