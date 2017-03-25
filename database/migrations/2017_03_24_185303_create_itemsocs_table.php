<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('itemsocs')) {
            Schema::create('itemsocs', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('folio_id')->unsigned()->nullable();
                $table->foreign('folio_id', 'fk_24885_proveedoroc_folio_id_itemsoc')->references('id')->on('proveedorocs')->onDelete('cascade');
                $table->integer('producto_id')->unsigned()->nullable();
                $table->foreign('producto_id', 'fk_24334_producto_producto_id_itemsoc')->references('id')->on('productos')->onDelete('cascade');
                $table->integer('presentancion_id')->unsigned()->nullable();
                $table->foreign('presentancion_id', 'fk_24333_presentacionfarmacologica_presentancion_i')->references('id')->on('presentacion_farmacologicas')->onDelete('cascade');
                $table->integer('cantidad')->nullable();
                $table->decimal('precio_unidad', 15, 2)->nullable();
                $table->text('observaciones')->nullable();
                
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
        Schema::dropIfExists('itemsocs');
    }
}
