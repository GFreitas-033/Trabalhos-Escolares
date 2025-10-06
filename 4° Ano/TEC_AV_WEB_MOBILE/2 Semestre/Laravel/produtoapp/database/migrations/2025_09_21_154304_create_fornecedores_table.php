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
        Schema::create('fornecedors', function (Blueprint $table) {
            $table->increments('id'); //Unsigned INT, Primary key, autoincremento e não permite Nulo
            $table->string('nome', length: 255); //VARCHAR de 255
            $table->string('site', length: 255); //VARCHAR de 255
            $table->string('uf', length: 2); //VARCHAR de 255
            $table->string('email', length: 255); //VARCHAR de 255
            $table->timestamps(); //Cria dois campos created_at e updated_at do tipo TIMESTAMP que são atualizados automaticamente pelo Eloquent ORM do Laravel
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedors');
    }
};
