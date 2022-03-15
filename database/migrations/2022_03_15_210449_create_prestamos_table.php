<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('libro_id')->nullable();

            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('libro_id')->references('id')
                ->on('libros')
                ->onDelete('set null');

            $table->enum('status', ['entregado', 'pendiente', 'retrasado'])->default('pendiente');
            $table->string('cantidad');
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
        Schema::dropIfExists('prestamos');
    }
}
