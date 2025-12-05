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
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id'); //Unsigned INT, Primary key, autoincremento e não permite Nulo
            $table->unsignedInteger('fornecedor_id');
            $table->string('nome', length: 200); //VARCHAR de 200
            $table->decimal('preco', total: 10, places:2); //Números com casa decimal, com 8 dígitos antes da vírgula e 2 depois
            $table->unsignedInteger('quantidade'); //Inteiro positivo
            $table->text('descricao')->nullable(); //TEXT, permite Nulo
            $table->timestamps(); //Cria dois campos created_at e updated_at do tipo TIMESTAMP que são atualizados automaticamente pelo Eloquent ORM do Laravel

            //Constraints de Relacionamento e Unicidade
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
