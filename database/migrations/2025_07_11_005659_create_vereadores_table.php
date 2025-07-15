<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vereadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partido_id')->constrained()->onDelete('cascade'); // <- CORRIGIDO onDelete
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->string('email')->unique();
            $table->string('telefone');
            $table->string('estado', 2);
            $table->string('cidade');
            $table->string('foto')->nullable(); // <- ALTERADO de imagem para foto
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vereadores');
    }
};
