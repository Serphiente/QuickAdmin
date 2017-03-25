<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1490381755ProveedorocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proveedorocs', function (Blueprint $table) {
            $table->text('observaciones')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proveedorocs', function (Blueprint $table) {
            $table->dropColumn('observaciones');
            
        });

    }
}
