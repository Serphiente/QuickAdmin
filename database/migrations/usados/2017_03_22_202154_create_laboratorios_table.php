<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('laboratorios')) {
            Schema::create('laboratorios', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre');
                $table->string('rut');
                $table->string('dv');
                $table->string('direccion');
                $table->integer('ciudad_id')->unsigned()->nullable();
                $table->foreign('ciudad_id', 'fk_24292_comuna_ciudad_id_laboratorio')->references('id')->on('comunas')->onDelete('cascade');
                $table->string('telefono')->nullable();
                $table->string('email')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboratorios');
    }
}
