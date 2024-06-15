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
        Schema::create('o_s', function (Blueprint $table) {
            $table->id()->index();
            $table->foreignId('cliente_id')->constrained()->index()->cascadeOnDelete()->nullable();
            $table->foreignId('servico_id')->constrained()->index()->cascadeOnDelete()->nullable();

            $table->string('descricao');
            $table->decimal('preco');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_s');
    }
};
