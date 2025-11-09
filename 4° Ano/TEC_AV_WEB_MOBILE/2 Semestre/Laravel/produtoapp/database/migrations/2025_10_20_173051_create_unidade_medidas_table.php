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
        Schema::create('unidade_medidas', function (Blueprint $table) {
            $table->id();
            $table->string('nome',50);     // Quilograma, Metro, Grama, Centímetro, etc
            $table->string('simbolo',10);  // kg, m, g
            $table->string('tipo',50);     // peso, comprimento, volume, etc.
            $table->timestamps();
        });

        //Adicionar os relacionamentos com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_peso_id')->after('produto_id'); //Cria a coluna para a fk
            //Aplica a fk
            $table->foreign('unidade_peso_id')->references('id')->on('unidade_medidas')->onDelete('restrict'); 
            $table->unsignedBigInteger('unidade_dimensao_id')->after('unidade_peso_id'); //Cria a coluna para a fk
            //Aplica a fk
            $table->foreign('unidade_dimensao_id')->references('id')->on('unidade_medidas')->onDelete('restrict'); 
        });
    }

    public function down(): void
    {
        //Remover o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->dropForeign(['unidade_peso_id']);
            $table->dropForeign(['unidade_dimensao_id']);
            $table->dropColumn(['unidade_peso_id', 'unidade_dimensao_id']);
        });

        Schema::dropIfExists('unidade_medidas');
    }
};
