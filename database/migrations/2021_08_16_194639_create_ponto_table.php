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
        Schema::create('ponto', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->integer('usuario_id')->nullable();
            $table->date('data')->nullable();
            $table->time('entrada')->nullable();
            $table->smallInteger('entrada_status')->nullable();
            $table->time('saida')->nullable();
            $table->smallInteger('saida_status')->nullable();
            $table->smallInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponto');
    }
};
