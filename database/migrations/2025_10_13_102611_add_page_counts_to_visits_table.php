<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->unsignedBigInteger('app_count')->default(0)->after('count');
            $table->unsignedBigInteger('tk_count')->default(0)->after('app_count');
            $table->unsignedBigInteger('sd_count')->default(0)->after('tk_count');
            $table->unsignedBigInteger('smp_count')->default(0)->after('sd_count');
            $table->unsignedBigInteger('sma_count')->default(0)->after('smp_count');
        });
    }

    public function down(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->dropColumn(['app_count', 'tk_count', 'sd_count', 'smp_count', 'sma_count']);
        });
    }
};