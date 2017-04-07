<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491432744FacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facturas', function (Blueprint $table) {
            if(Schema::hasColumn('facturas', 'producto')) {
                $table->dropForeign('fk_24334_producto_producto_id_factura');
                $table->dropIndex('fk_24334_producto_producto_id_factura');
                $table->dropColumn('producto_id');
            }
            if(Schema::hasColumn('facturas', 'cantidad')) {
                $table->dropColumn('cantidad');
            }
            if(Schema::hasColumn('facturas', 'precio')) {
                $table->dropColumn('precio');
            }
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturas', function (Blueprint $table) {
                        $table->integer('producto_id')->unsigned()->nullable();
                $table->foreign('producto_id', 'fk_24334_producto_producto_id_factura')->references('id')->on('productos')->onDelete('cascade');
                $table->integer('cantidad')->nullable();
                $table->decimal('precio', 15, 2)->nullable();
                
        });

    }
}
