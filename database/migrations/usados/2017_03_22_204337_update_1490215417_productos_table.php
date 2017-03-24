<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1490215417ProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->integer('laboratorio_id')->unsigned()->nullable();
                $table->foreign('laboratorio_id', 'fk_24328_laboratorio_laboratorio_id_producto')->references('id')->on('laboratorios')->onDelete('cascade');
                $table->integer('presentacion_id')->unsigned()->nullable();
                $table->foreign('presentacion_id', 'fk_24333_presentacionfarmacologica_presentacion_id')->references('id')->on('presentacion_farmacologicas')->onDelete('cascade');
                $table->integer('modo_uso_id')->unsigned()->nullable();
                $table->foreign('modo_uso_id', 'fk_24332_modouso_modo_uso_id_producto')->references('id')->on('modo_usos')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('fk_24328_laboratorio_laboratorio_id_producto');
            $table->dropIndex('fk_24328_laboratorio_laboratorio_id_producto');
            $table->dropColumn('laboratorio_id');
            $table->dropForeign('fk_24333_presentacionfarmacologica_presentacion_id_producto');
            $table->dropIndex('fk_24333_presentacionfarmacologica_presentacion_id_producto');
            $table->dropColumn('presentacion_id');
            $table->dropForeign('fk_24332_modouso_modo_uso_id_producto');
            $table->dropIndex('fk_24332_modouso_modo_uso_id_producto');
            $table->dropColumn('modo_uso_id');
            
        });

    }
}
