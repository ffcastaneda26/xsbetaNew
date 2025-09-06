<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('description', 255)->change();
        });
    }

    public function down(): void
    {
        // Revierte el cambio en caso de un 'rollback'
        Schema::table('blogs', function (Blueprint $table) {
            $table->mediumText('description')->change();
        });
    }
};
