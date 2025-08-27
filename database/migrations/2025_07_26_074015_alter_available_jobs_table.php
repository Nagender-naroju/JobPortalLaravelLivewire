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
        Schema::table('available_jobs', function (Blueprint $table) {
            $table->tinyInteger('status')->after('user_id')->default(1); // Add a new column
            $table->tinyInteger('is_featured')->after('status')->default(0); // Add a new column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('available_jobs', function (Blueprint $table) {
            $table->bigIntegtinyIntegerer('status'); // Add a new column
            $table->bigIntegtinyIntegerer('is_featured'); // Add a new column
        });
    }
};
