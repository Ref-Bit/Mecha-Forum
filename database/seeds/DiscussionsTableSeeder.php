<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $t1 = 'Implementing OAuth with Laravel framework';
        $t2 = 'Pagination in Vuejs not working properly';
        $t3 = 'Vuejs event listeners for child components';
        $t4 = 'Laravel homestead error - undetected database';

        $d1 = [
            'title'=>$t1,
            'body'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices ex ac dui finibus aliquam. Sed et lectus ut arcu ultricies accumsan eget eu elit. Morbi justo justo, ultrices et sollicitudin eu, tempus in libero. Duis eu posuere mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean maximus augue ac est pellentesque, at molestie ante feugiat. Nulla quis dui massa. Maecenas non sagittis nunc, eu feugiat ipsum. Vivamus leo dui, interdum fringilla odio sed, lobortis faucibus leo. Praesent sed luctus erat, id fringilla urna. Nullam pharetra eu metus at faucibus. Nulla tempor neque nunc, eu fermentum ante laoreet nec. Etiam ut ante augue. Ut consequat eros id purus convallis, id iaculis magna convallis. Donec dignissim congue ex vulputate fermentum. Duis viverra mauris sed massa ultricies, at blandit ipsum sollicitudin.',
            'channel_id'=>1,
            'user_id'=>2,
            'slug'=>str_slug($t1)
        ];

        $d2 = [
            'title'=>$t2,
            'body'=>'In est dolor, blandit posuere libero aliquam, lacinia feugiat nisl. Proin bibendum lectus quam, ac tristique lorem commodo in. Vivamus in felis eget quam sollicitudin consectetur. Vivamus at purus eu neque dignissim dictum nec vitae enim. Suspendisse potenti. Pellentesque lobortis, nisi id interdum consequat, leo magna eleifend nulla, at dictum justo ipsum ac ipsum. Morbi sodales quam ut molestie convallis.',
            'channel_id'=>4,
            'user_id'=>1,
            'slug'=>str_slug($t2)
        ];

        $d3 = [
            'title'=>$t3,
            'body'=>'Integer ac suscipit felis. Pellentesque ultricies orci consequat arcu vehicula euismod. Aenean hendrerit nec eros in ultricies. Nullam aliquam elit nec commodo feugiat. Nunc id ligula consectetur massa hendrerit imperdiet nec at risus. Sed non turpis auctor justo auctor scelerisque eu vitae augue. Donec posuere sollicitudin dui, at lacinia lorem semper ut. Vestibulum mattis non sem at molestie. Nam pretium neque aliquet, aliquam odio eget, dapibus tellus.',
            'channel_id'=>3,
            'user_id'=>2,
            'slug'=>str_slug($t3)
        ];


        $d4 = [
            'title'=>$t4,
            'body'=>'Maecenas id purus enim. Mauris ornare augue id odio consectetur, sed bibendum erat lobortis. Aliquam nunc leo, laoreet sit amet congue id, dictum nec eros. Quisque eget lacus et odio condimentum elementum. Morbi nec felis sed sem tempus imperdiet. Cras eget tincidunt augue, quis commodo diam. Nunc vestibulum enim erat, vitae auctor diam auctor nec. Pellentesque ultricies, risus a iaculis semper, arcu felis iaculis libero, quis ultrices nibh mauris a elit. Vestibulum eu tellus a elit pulvinar mattis. In aliquam nec velit non cursus. Donec a fringilla neque. Sed non neque est.',
            'channel_id'=>8,
            'user_id'=>1,
            'slug'=>str_slug($t4)
        ];

        \App\Discussion::create($d1);
        \App\Discussion::create($d2);
        \App\Discussion::create($d3);
        \App\Discussion::create($d4);

    }
}
