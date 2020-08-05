<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /* 
        Criação da tabela de Repúblicas
    */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->string("city");
            $table->string("state");
            $table->string("CEP")->nullable();
            $table->string("street");
            $table->integer("number");
            $table->string("complement");
            $table->float("price");
            $table->integer("num_of_bedrooms")->nullable();
            $table->integer("num_of_bathrooms")->nullable();
            $table->integer("dislikes")->nullable();
            $table->integer("likes")->nullable();
            $table->integer("type")->nullable();
            $table->longText("description")->nullable();
            $table->string("gender")->nullable();
            $table->boolean("pets")->nullable();
            $table->boolean("condominium")->nullable();
            $table->boolean("furniture")->nullable();
            $table->boolean("wifi")->nullable();
            $table->boolean("air_conditioner")->nullable();
            $table->integer("water_heating")->nullable();  //1 for no heating, 2 for gas and 3 for electric
            $table->boolean("pool")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->string('photo')->nullable();
            
        });
        /* 
            Adição de id do usuário que criou a república (locatário)
        */
        Schema::table('republics',function (Blueprint $table){
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
        }); 

        //Implementa SoftDeletes
        Schema::table('republics', function (Blueprint $table) {
            $table->softDeletes();
        });
        
    }

    //Exclusão da tabela de repúblicas
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
