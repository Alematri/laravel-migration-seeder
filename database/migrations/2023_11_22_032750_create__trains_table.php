<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('Azienda',50);
            $table->string('StazioneDiPartenza',50);
            $table->string('StazioneDiArrivo',50);
            $table->time('OrarioDiPartenza');
            $table->time('OrarioDiArrivo');
            $table->char('CodiceTreno', 5);
            $table->tinyInteger('NumeroCarrozza', 5);
            $table->boolean('InOrario')->default(true);
            $table->boolean('InOrario')->default(false);
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
        Schema::dropIfExists('_trains');
    }
};
