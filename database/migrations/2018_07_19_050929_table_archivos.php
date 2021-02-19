<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableArchivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('album_id')->unsigned();

            $table->string('nombre_foto', 120);
            $table->string('ref_foto', 220);
            $table->string('patologia', 80);
            $table->string('region', 80);
            $table->string('periodo', 80);
            $table->string('tipo_archivo', 80);
            $table->timestamps();

            //Relacion
            $table->foreign('album_id')->references('id')->on('albums')
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
        Schema::dropIfExists('archivos');
    }
}
