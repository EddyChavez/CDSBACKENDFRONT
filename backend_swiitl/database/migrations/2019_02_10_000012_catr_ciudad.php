<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CATRCIUDAD extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CATR_CIUDAD', function (Blueprint $table) {

            /* CLAVES PRIMARIAS */
            $table->increments('PK_CIUDAD');
            
            /* DATOS GENERALES */
            $table->string('NOMBRE');

            /* CLAVES FORANEAS */
            $table->integer('FK_ENTIDAD_FEDERATIVA');
            $table->foreign('FK_ENTIDAD_FEDERATIVA')->references('PK_ENTIDAD_FEDERATIVA')->on('CAT_ENTIDAD_FEDERATIVA');

            /* DATOS DE AUDITORIA */
            $table->integer('FK_USUARIO_REGISTRO')->nullable();
            $table->dateTime('FECHA_REGISTRO')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('FK_USUARIO_MODIFICACION')->nullable();
            $table->dateTime('FECHA_MODIFICACION')->nullable();
            $table->char('BORRADO',1)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CAT_CIUDAD');
    }
}
