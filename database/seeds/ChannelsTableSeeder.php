<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $channel1 = ['title' => 'Laravel', 'slug' => str_slug('Laravel')];
        Channel::create($channel1);

        $channel2 = ['title' => 'Vuejs', 'slug' => str_slug('Vuejs')];
        Channel::create($channel2);

        $channel3 = ['title' => 'CSS3', 'slug' => str_slug('CSS3')];
        Channel::create($channel3);

        $channel4 = ['title' => 'Javascript', 'slug' => str_slug('Javascript')];
        Channel::create($channel4);

        $channel5 = ['title' => 'PHP', 'slug' => str_slug('PHP')];
        Channel::create($channel5);

        $channel6 = ['title' => 'Spark', 'slug' => str_slug('Spark')];
        Channel::create($channel6);

        $channel7 = ['title' => 'HTML5', 'slug' => str_slug('HTML5')];
        Channel::create($channel7);

        $channel8 = ['title' => 'Angular', 'slug' => str_slug('Angular')];
        Channel::create($channel8);

        $channel9 = ['title' => 'NodeJS', 'slug' => str_slug('NodeJS')];
        Channel::create($channel9);

        $channel10 = ['title' => 'Composer', 'slug' => str_slug('Composer')];
        Channel::create($channel10);
    }
}
