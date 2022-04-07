<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('book_id')->nullable();

            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('book_id')->references('id')
                ->on('books')
                ->onDelete('set null');

            $table->enum('status', ['Entregado', 'Pendiente', 'Retrasado'])->default('Pendiente');
            $table->timestamp('returned_at');
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
        Schema::dropIfExists('book_records');
    }
}
