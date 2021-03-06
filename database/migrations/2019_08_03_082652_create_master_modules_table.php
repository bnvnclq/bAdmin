<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 63);
            $table->text('description')->nullable();
            $table->string('code', 63);
            $table->integer('parent_id')->nullable();
            $table->string('icon_class', 127)->default('fa fa-tablet');
            $table->string('route_name', 127)->default('home');
            $table->boolean('is_enable')->default(true);
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
        Schema::dropIfExists('master_modules');
        Schema::enableForeignKeyConstraints();
    }
}
