<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telpons', function (Blueprint $table) {
            $table->bigInteger('id_siswa')
                    ->unsigned()
                    ->primary('id_siswa');

            $table->string('nomor_telepon')->unique();

            $table->timestamps();

            $table->foreign('id_siswa')
                  ->references('id')->on('siswas') // id yang didapat dari table siswa.
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telpons');
    }
}
