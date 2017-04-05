<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491406343RecepcionmercaderiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recepcionmercaderias', function (Blueprint $table) {
            $table->integer('precio_compra')->nullable()->unsigned();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recepcionmercaderias', function (Blueprint $table) {
            $table->dropColumn('precio_compra');
            
        });

    }
}
