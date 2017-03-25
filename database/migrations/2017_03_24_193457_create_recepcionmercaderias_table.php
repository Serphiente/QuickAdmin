<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecepcionmercaderiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('recepcionmercaderias')) {
            Schema::create('recepcionmercaderias', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('proveedor_id')->unsigned()->nullable();
                $table->foreign('proveedor_id', 'fk_24885_proveedoroc_proveedor_id_recepcionmercade')->references('id')->on('proveedorocs')->onDelete('cascade');
                $table->date('fecha')->nullable();
                $table->integer('producto_id')->unsigned()->nullable();
                $table->foreign('producto_id', 'fk_24334_producto_producto_id_recepcionmercaderium')->references('id')->on('productos')->onDelete('cascade');
                $table->string('lote')->nullable();
                $table->string('fecha_vencimiento')->nullable();
                
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
        Schema::dropIfExists('recepcionmercaderias');
    }
}
