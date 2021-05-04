<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('experiencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('ubicacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('salarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });


        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('imagen');
            $table->text('descripcion');
            $table->text('skills'); // quemado?
            $table->boolean('activa')->default(true); // visible o no visible
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade'); // categorias->id
            $table->foreignId('experiencia_id')->constrained()->onDelete('cascade'); // experiencias->id
            $table->foreignId('ubicacion_id')->constrained()->onDelete('cascade'); // ubicacions->id
            $table->foreignId('salario_id')->constrained()->onDelete('cascade'); // salarios->id
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // users->id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacantes');
        //
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('experiencias');
        Schema::dropIfExists('ubicacions');
        Schema::dropIfExists('salarios');
    }
}
