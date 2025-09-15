<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->string('judul_en')->nullable()->after('judul');
            $table->text('deskripsi_en')->nullable()->after('deskripsi');
        });
    }

    public function down()
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropColumn(['judul_en', 'deskripsi_en']);
        });
    }
};