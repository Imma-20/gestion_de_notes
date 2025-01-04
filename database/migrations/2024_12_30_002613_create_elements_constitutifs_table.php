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
        Schema::create('elements_constitutifs', function (Blueprint $table) {
            $table->id();
            $table->string('code', 6);
            $table->string('nom');
            $table->integer('coefficient');
            $table->unsignedBigInteger('ue_id');
            $table->foreign('ue_id')->references('id')->on('unites_enseignement')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elements_constitutifs');
    }
};
