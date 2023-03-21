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
        Schema::create('users_relations', function (Blueprint $table) {
            //$table->id('id_relation');
            $table->unsignedBigInteger('user_from');
            $table->unsignedBigInteger('user_id');
            $table->primary(['user_from','user_id']);//([chaves-estrangeiras],chaves-orginais-daqui) => chave primaria
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_from')->references('id')->on('users');
            /* COM ESSA ESTRUTURA, CASO EU INSIRA UMA LINHA DUPLICADA, SEREI BARRO. 
            VALUES(1, 2, 3)
            VALUES(2, 2, 3) 
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_relations');
    }
};
