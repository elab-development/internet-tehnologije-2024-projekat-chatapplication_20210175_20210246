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
        Schema::table('clanoviGrupniChat', function (Blueprint $table) {
            $table->foreign('Grupa')->references('id')->on('grupniChat')->onDelete('cascade');
            $table->foreign('Clan')->references('id')->on('korisnik')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clanoviGrupniChat', function (Blueprint $table) {
            $table->dropForeign(['Grupa']);
            $table->dropForeign(['Clan']);
        });
    }
};
