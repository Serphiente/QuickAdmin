<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('clientes')) {
            Schema::create('clientes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('rut');
                $table->string('dv');
                $table->string('nombre');
                $table->string('direccion_factura')->nullable();
                $table->string('direccion_despacho')->nullable();
                $table->integer('comuna_id')->unsigned()->nullable();
                $table->foreign('comuna_id', 'fk_24292_comuna_comuna_id_cliente')->references('id')->on('comunas')->onDelete('cascade');
                
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
        Schema::dropIfExists('clientes');
    }
}
