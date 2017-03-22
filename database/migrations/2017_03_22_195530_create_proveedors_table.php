<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('proveedors')) {
            Schema::create('proveedors', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre');
                $table->string('rut');
                $table->string('dv');
                $table->string('direccion')->nullable();
                $table->string('telefono')->nullable();
                $table->string('email')->nullable();
                $table->integer('comuna_id')->unsigned()->nullable();
                $table->foreign('comuna_id', 'fk_24292_comuna_comuna_id_proveedor')->references('id')->on('comunas')->onDelete('cascade');
                
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
        Schema::dropIfExists('proveedors');
    }
}
