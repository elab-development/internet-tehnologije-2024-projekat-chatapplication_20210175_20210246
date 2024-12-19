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
        Schema::table('poruka', function (Blueprint $table) {
            $table->foreign('OdKoga')->references('id')->on('korisnik')->onDelete('cascade');
            $table->foreign('ZaKoga')->references('id')->on('korisnik')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('poruka', function (Blueprint $table) {
            $table->dropForeign(['OdKoga']);
            $table->dropForeign(['ZaKoga']);
        });
    }
};
