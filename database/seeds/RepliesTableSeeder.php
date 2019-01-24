<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $r1 = [
            'user_id'=>1,
            'discussion_id'=>2,
            'body'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices ex ac dui finibus aliquam. Sed et lectus ut arcu ultricies accumsan eget eu elit. Morbi justo justo, ultrices et sollicitudin eu, tempus in libero. Duis eu posuere mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean maximus augue ac est pellentesque, at molestie ante feugiat. Nulla quis dui massa. Maecenas non sagittis nunc, eu feugiat ipsum',
        ];

        $r2 = [
            'user_id'=>2,
            'discussion_id'=>1,
            'body'=>'Vivamus leo dui, interdum fringilla odio sed, lobortis faucibus leo. Praesent sed luctus erat, id fringilla urna. Nullam pharetra eu metus at faucibus. Nulla tempor neque nunc, eu fermentum ante laoreet nec. Etiam ut ante augue. Ut consequat eros id purus convallis, id iaculis magna convallis. Donec dignissim congue ex vulputate fermentum. Duis viverra mauris sed massa ultricies, at blandit ipsum sollicitudin.',
        ];

        $r3 = [
            'user_id'=>2,
            'discussion_id'=>3,
            'body'=>'In est dolor, blandit posuere libero aliquam, lacinia feugiat nisl. Proin bibendum lectus quam, ac tristique lorem commodo in. Vivamus in felis eget quam sollicitudin consectetur. Vivamus at purus eu neque dignissim dictum nec vitae enim. Suspendisse potenti. Pellentesque lobortis, nisi id interdum consequat, leo magna eleifend nulla, at dictum justo ipsum ac ipsum. Morbi sodales quam ut molestie convallis',
        ];

        $r4 = [
            'user_id'=>2,
            'discussion_id'=>3,
            'body'=>'Morbi nec felis sed sem tempus imperdiet. Cras eget tincidunt augue, quis commodo diam. Nunc vestibulum enim erat, vitae auctor diam auctor nec. Pellentesque ultricies, risus a iaculis semper, arcu felis iaculis libero, quis ultrices nibh mauris a elit. Vestibulum eu tellus a elit pulvinar mattis. In aliquam nec velit non cursus. Donec a fringilla neque. Sed non neque est.',
        ];

        \App\Reply::create($r1);
        \App\Reply::create($r2);
        \App\Reply::create($r3);
        \App\Reply::create($r4);


    }
}
