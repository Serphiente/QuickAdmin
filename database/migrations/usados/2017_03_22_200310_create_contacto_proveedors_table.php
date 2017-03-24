<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('contacto_proveedors')) {
            Schema::create('contacto_proveedors', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre');
                $table->string('apellido');
                $table->string('telefono');
                $table->string('email');
                $table->integer('proveedor_id')->unsigned()->nullable();
                $table->foreign('proveedor_id', 'fk_24314_proveedor_proveedor_id_contacto_proveedor')->references('id')->on('proveedors')->onDelete('cascade');
                
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
        Schema::dropIfExists('contacto_proveedors');
    }
}
