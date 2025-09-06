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
        Schema::table('products', function (Blueprint $table) {
            $table->string('link_name', 255)->nullable()->after('stock')->comment('Nombre de link');
            $table->string('link_url', 255)->nullable()->after('link_name')->comment('URL del Link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('link_name');
            $table->dropColumn('link_url');
        });
    }
};
