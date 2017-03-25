<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('proveedorocs')) {
            Schema::create('proveedorocs', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('folio')->nullable();
                $table->integer('proveedor_id')->unsigned()->nullable();
                $table->foreign('proveedor_id', 'fk_24314_proveedor_proveedor_id_proveedoroc')->references('id')->on('proveedors')->onDelete('cascade');
                $table->date('fecha')->nullable();
                
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
        Schema::dropIfExists('proveedorocs');
    }
}
