<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     // DB::table('users')->insert([
        //     'name' => 'Giorno Giovanne',
        //     'email' => 'goldenxp@experience.com',
        //     'phone' => '3423412441'
        // ]);
    

    public function run()
    {
      /* App\User::create([
         'name' => 'Kujo Jotaro',
         'email' => 'star@latinum.com',
         'password' => 'vintetres',
         'phone' => '234132',
         'birth_date' => '21/08/1990',
         'descricao' => 'Descrição'
     ]);*/

    //gera dados aleatórios
    factory (App\User::class,12)->create();
        
    }
}
