<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apprenant_course_id');
            $table->foreign('apprenant_course_id')->references('id')->on('apprenant_course')->onDelete('cascade');
            $table->unsignedBigInteger('catego_id');
            $table->foreign('catego_id')->references('id')->on('categos')->onDelete('cascade');
            $table->string('namespec');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificats');
    }
}
