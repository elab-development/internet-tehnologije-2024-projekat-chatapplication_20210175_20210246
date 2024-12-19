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
        Schema::create('poruka', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('OdKoga');
        $table->unsignedBigInteger('ZaKoga');
        $table->time('Vreme');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poruka');
    }
};
