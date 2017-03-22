<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('provincias')) {
            Schema::create('provincias', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre');
                $table->integer('region_id')->unsigned()->nullable();
                $table->foreign('region_id', 'fk_24290_region_region_id_provincium')->references('id')->on('regions')->onDelete('cascade');
                
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
        Schema::dropIfExists('provincias');
    }
}
