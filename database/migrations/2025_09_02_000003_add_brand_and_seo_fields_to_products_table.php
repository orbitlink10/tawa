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
        Schema::table('products', function (Blueprint $table) {
            $table->string('model')->nullable()->after('sku');
            $table->unsignedBigInteger('brand_id')->nullable()->after('sub_category_id');
            $table->text('short_description')->nullable()->after('description');
            $table->json('specifications')->nullable()->after('short_description');
            $table->string('stock_status')->nullable()->after('stock');
            $table->string('meta_title')->nullable()->after('meta_description');
            $table->string('canonical_url')->nullable()->after('meta_title');
            $table->boolean('featured')->default(false)->after('is_active');
            $table->boolean('noindex')->default(false)->after('featured');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropColumn([
                'model',
                'brand_id',
                'short_description',
                'specifications',
                'stock_status',
                'meta_title',
                'canonical_url',
                'featured',
                'noindex',
            ]);
        });
    }
};
