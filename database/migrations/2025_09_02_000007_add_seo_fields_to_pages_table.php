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
        Schema::table('pages', function (Blueprint $table) {
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('canonical_url')->nullable()->after('meta_description');
            $table->boolean('noindex')->default(false)->after('canonical_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['meta_description', 'canonical_url', 'noindex']);
        });
    }
};
