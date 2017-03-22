<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1490207698UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rut')->nullable();
                $table->string('dv')->nullable();
                $table->string('cuenta_banco')->nullable();
                $table->string('cuenta_tipo')->nullable();
                $table->string('cuenta_numero')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rut');
            $table->dropColumn('dv');
            $table->dropColumn('cuenta_banco');
            $table->dropColumn('cuenta_tipo');
            $table->dropColumn('cuenta_numero');
            
        });

    }
}
