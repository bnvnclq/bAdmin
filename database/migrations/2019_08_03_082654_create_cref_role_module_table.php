<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrefRoleModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cref_role_module', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('module_id')->unsigned();
        });
        Schema::table('cref_role_module', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('master_roles')->onUpdate('Cascade');
            $table->foreign('module_id')->references('id')->on('master_modules')->onUpdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cref_role_module');
        Schema::enableForeignKeyConstraints();
    }
}
