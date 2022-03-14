<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoristasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratoristas', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unsigned();
            $table->string("nombre", 50);
            $table->string("ci", 10);
            $table->string("especialidad", 15);
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboratoristas');
    }
}
