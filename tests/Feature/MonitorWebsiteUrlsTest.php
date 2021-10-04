<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MonitorWebsiteUrlsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostUrlsToWebsite()
    {
        $url = 'test.com';
        $response = $this->post('/monitors', [
            'urls' => [$url],
            'status' => false
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('websites', [
            'url' => $url
        ]);
    }
}
