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
        Schema::table('danh_sach_tai_khoans', function (Blueprint $table) {
            $table->string('ma_doi_mat_khau')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('danh_sach_tai_khoans', function (Blueprint $table) {
            //
        });
    }
};
