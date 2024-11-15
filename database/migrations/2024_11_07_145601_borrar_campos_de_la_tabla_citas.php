<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropColumn(['servicio']); // Especifica las columnas a eliminar
        });
    }

    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->string('servicio'); // Vuelve a agregar la columna en caso de revertir la migración
        });
    }
};