<?php

use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Website::insert([
        //     ['url' => 'https://onet.pl'],
        //     ['url' => 'http://socialmention.com'],
        //     ['url' => 'http://test-redirects.137.software'],
        //     ['url' => 'https://google.com'],
        // ]);

        factory(Website::class, 25)->create();
    }
}
