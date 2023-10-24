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
        Schema::create('tb_submit', function (Blueprint $table) {
            $table->id();
            $table->text('username');
            $table->integer('id_modul');
            $table->integer('id_topic');
            $table->integer('id_subtopic');
            $table->longText('pendapat1');
            $table->longText('pendapat2');
            $table->longText('kesimpulan');
            $table->text('penulis1');
            $table->text('penulis2');
            $table->longText('sumber1');
            $table->longText('sumber2');
            $table->integer('tahun1');
            $table->integer('tahun2');
            $table->text('judul1');
            $table->text('judul2');
            $table->text('status')->default('null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_submit');
    }
};
