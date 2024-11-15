<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->string('servicio')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropUnique(['servicio']);
        });
    }
};
