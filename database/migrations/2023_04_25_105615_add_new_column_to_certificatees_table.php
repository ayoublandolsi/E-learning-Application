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
        Schema::table('certificatees', function (Blueprint $table) {
            $table->unsignedBigInteger('prof_id');
            $table->foreign('prof_id')->references('id')->on('profs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('certificatees', function (Blueprint $table) {
            //
        });
    }
};
