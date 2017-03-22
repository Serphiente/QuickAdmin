<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1490216329FacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->decimal('precio', 15, 2)->nullable();
                $table->integer('condicion_pago')->nullable();
                $table->tinyInteger('estado_pago')->nullable()->default(1);
                $table->tinyInteger('documento_valido')->default(1);
                
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
            $table->dropColumn('precio');
            $table->dropColumn('condicion_pago');
            $table->dropColumn('estado_pago');
            $table->dropColumn('documento_valido');
            
        });

    }
}
