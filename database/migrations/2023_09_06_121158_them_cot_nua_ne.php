<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('danh_sach_tai_khoans', function (Blueprint $table) {
            $table->string('thay_the_id')->nullable();
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
