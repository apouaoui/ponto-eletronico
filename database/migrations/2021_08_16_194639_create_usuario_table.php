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
        Schema::create('usuario', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('nome', 100)->nullable();
            $table->string('cpf', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('senha', 100)->nullable();
            $table->string('cargo', 100)->nullable();
            $table->string('regime', 100)->nullable();
            $table->string('local', 100)->nullable();
            $table->smallInteger('admin')->nullable()->default(0);
            $table->smallInteger('ativo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
