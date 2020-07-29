<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /* 
        Criação da tebela de usuários
    */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('birth_date');
            $table->string('password');
            $table->string('descricao');
            $table->string('cpf')->unique()->nullable();
            $table->string('cnpj')->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

   /*
    Exclusão da tabela de usuários
   */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
