<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentacionFarmacologicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('presentacion_farmacologicas')) {
            Schema::create('presentacion_farmacologicas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre');
                $table->string('nombre_corto');
                
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
        Schema::dropIfExists('presentacion_farmacologicas');
    }
}
