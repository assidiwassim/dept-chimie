<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnnonce extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typeannonce');
            $table->string('natureannonce');
            $table->string('designation');

            $table->string('refproduit')->nullable();
            $table->double('qte',10,3)->nullable();

            $table->string('refproduitEchange')->nullable();
            $table->double('qteEchange',10,3)->nullable();
            

            $table->string('file')->nullable();
            
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
        Schema::dropIfExists('annonces');
    }
}
