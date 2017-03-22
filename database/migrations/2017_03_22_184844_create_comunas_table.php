<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('comunas')) {
            Schema::create('comunas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre');
                $table->integer('provincia_id')->unsigned()->nullable();
                $table->foreign('provincia_id', 'fk_24291_provincium_provincia_id_comuna')->references('id')->on('provincias')->onDelete('cascade');
                
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
        Schema::dropIfExists('comunas');
    }
}
