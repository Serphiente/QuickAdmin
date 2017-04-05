<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1490384540RecepcionmercaderiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recepcionmercaderias', function (Blueprint $table) {
            $table->integer('cantidad')->nullable();
                
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
            $table->dropColumn('cantidad');
            
        });

    }
}
