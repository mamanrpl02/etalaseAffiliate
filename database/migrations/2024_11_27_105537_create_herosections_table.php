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
        Schema::create('herosections', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Untuk h1
            $table->string('keterangan'); // Untuk paragraf
            $table->string('textButton'); // Untuk paragraf
            $table->boolean('is_active')->default(false); // Status aktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('herosections');
    }
};
