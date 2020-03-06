<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,3) //usersを3件作成
        ->create()  //factory()->create() ⇒ Model::create()に該当
        ->each(function($u){ //
            $u->questions() //Use.phpのquestions()メソッドを呼ぶ(リレーションの作成)
              ->saveMany(
                  factory(\App\Question::class,rand(1,5))->make() //factory()->make() ⇒ new Model()に該当 5件作成
              );
        });
    }
}
