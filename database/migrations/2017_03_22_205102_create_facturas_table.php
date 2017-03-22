<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('facturas')) {
            Schema::create('facturas', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('folio')->nullable();
                $table->integer('vendedor_id')->unsigned()->nullable();
                $table->foreign('vendedor_id', 'fk_24289_user_vendedor_id_factura')->references('id')->on('users')->onDelete('cascade');
                $table->date('fecha')->nullable();
                $table->integer('cliente_id')->unsigned()->nullable();
                $table->foreign('cliente_id', 'fk_24299_cliente_cliente_id_factura')->references('id')->on('clientes')->onDelete('cascade');
                $table->integer('producto_id')->unsigned()->nullable();
                $table->foreign('producto_id', 'fk_24334_producto_producto_id_factura')->references('id')->on('productos')->onDelete('cascade');
                $table->integer('cantidad')->nullable();
                
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
        Schema::dropIfExists('facturas');
    }
}
