<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->integer('ano');
            $table->string('name');
            $table->string('email')->nullable();
            $table->bigInteger('telefone')->nullable()->numeric();
            $table->string('funcao');
            $table->string('nome_da_empresa');
            $table->string('localidade');
            $table->string('inicio_mes');
            $table->integer('inicio_ano');
            $table->string('termino_mes');
            $table->integer('termino_ano');
            $table->string('descricao_funcao');
            $table->string('usuario');
            $table->string('senha');            
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
        Schema::dropIfExists('candidatos');
    }
}
