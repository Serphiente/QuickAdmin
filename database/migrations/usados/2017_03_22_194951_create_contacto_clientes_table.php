<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('contacto_clientes')) {
            Schema::create('contacto_clientes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre');
                $table->string('apellido');
                $table->string('telefono');
                $table->string('email');
                $table->integer('cliente_id')->unsigned()->nullable();
                $table->foreign('cliente_id', 'fk_24299_cliente_cliente_id_contacto_cliente')->references('id')->on('clientes')->onDelete('cascade');
                
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
        Schema::dropIfExists('contacto_clientes');
    }
}
