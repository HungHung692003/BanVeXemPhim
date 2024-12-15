<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quyen_chuc_nangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_quyen');
            $table->integer('id_chuc_nang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quyen_chuc_nangs');
    }
};
