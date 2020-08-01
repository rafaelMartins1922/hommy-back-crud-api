<?php

use Illuminate\Database\Seeder;

class RepublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\Republic::class,5)->create()->each(function($republic){
            //cria 5 locatarios para cada reppublica
            $locatarios = factory(App\User::class,5)->create();
            $republic->userLocatario()->saveMany($locatarios);
            
            //cria e associa 5 comentários para cada locatário da nova república
            $comments = factory(App\Comment::class,rand(1,5))->create();
            foreach($comments as $comment){
                $republic->comments()->save($comment);
                foreach($locatarios as $loc){
                    $loc->comments()->save($comment);
                }
            } 
            //cria um usuário para ser locador da república
            $locador = factory(App\User::class)->create();
            $locador->republics()->save($republic);
            $republic->userLocatario()->saveMany($locatarios);
            $republic->userLocatario()->save($locador);

            //cria uma república sem comentários para cara república comentada
            $noCommentRepublic = factory(App\Republic::class)->create();
            $locador->republics()->save($noCommentRepublic);

        });
        

        
    }
}
