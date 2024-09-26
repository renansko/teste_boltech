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
        Schema::create('clientes_contatos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['telefone', 'email', 'outros']);
            $table->string('valor');
            $table->boolean('principal');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes_contatos');
    }
};
