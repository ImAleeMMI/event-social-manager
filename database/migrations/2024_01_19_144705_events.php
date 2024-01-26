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
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->unique();
            $table->dateTime('date', $precision = 0);
            $table->float('price', 4);
            $table->string('city');
            $table->string('address');
            $table->string('description');
            $table->timestamps();
            // Definizione della chiave esterna (foreign key) che fa riferimento alla colonna 'id' della tabella degli utenti ('users')
            $table->foreignId('user_id')->constrained($table = 'users', $column = 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
