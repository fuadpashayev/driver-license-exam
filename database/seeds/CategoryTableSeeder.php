<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 5)->create()->each(function ($c) {
            for ($i = 0; $i < 3; $i++) {
                $q =  $c->questions()->save(factory(App\Question::class)->make());

                $q->answers()->save(factory(App\Answer::class)->make());
                $a =  $q->answers()->save(factory(App\Answer::class)->make());
                $q->answers()->save(factory(App\Answer::class)->make());
                $q->answers()->save(factory(App\Answer::class)->make());

                $q->right_answer_id = $a->id;
                $q->save();
            }
        });
    }
}
