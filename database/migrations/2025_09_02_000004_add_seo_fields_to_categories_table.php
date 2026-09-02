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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('meta_description');
            $table->string('canonical_url')->nullable()->after('meta_title');
            $table->longText('seo_content')->nullable()->after('description');
            $table->boolean('noindex')->default(false)->after('canonical_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'canonical_url', 'seo_content', 'noindex']);
        });
    }
};
