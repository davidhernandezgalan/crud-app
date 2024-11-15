<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BorrarCamposDeLaTabla extends Migration
{
    public function up()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropColumn(['comentario']); // Especifica las columnas a eliminar
        });
    }

    public function down()
    {
        Schema::table('nombre_de_la_tabla', function (Blueprint $table) {
            $table->text('comentario')->nullable(); // Vuelve a agregar la columna en caso de revertir la migración
        });
    }
}
