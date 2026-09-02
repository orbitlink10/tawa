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
        Schema::table('sub_categories', function (Blueprint $table) {
            if (Schema::hasColumn('sub_categories', 'App\Models\Category') && ! Schema::hasColumn('sub_categories', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable()->after('slug');
            }
        });

        if (Schema::hasColumn('sub_categories', 'App\Models\Category')) {
            DB::statement('UPDATE `sub_categories` SET `category_id` = `App\Models\Category` WHERE `category_id` IS NULL');
            Schema::table('sub_categories', function (Blueprint $table) {
                $table->dropColumn('App\Models\Category');
            });
        }

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
