<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('hinh_anh');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
