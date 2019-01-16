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
//        factory(App\Category::class, 5)->create()->each(function ($c) {
//            for($j = 1;$j <=5;$j++){
//                $parent =  $c->questions()->save(factory(App\Question::class)->make());
//                $parent->image_url = 'https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg';
//                $parent->save();
//                for($i=1;$i<=3;$i++){
//                    $child = $c->questions()->save(factory(App\Question::class)->make());
//                    $child->parent_id = $parent->id;
//                    $child->answer = rand(0,1);
//                    $child->save();
//                }
//            }
//        });
    }
}
