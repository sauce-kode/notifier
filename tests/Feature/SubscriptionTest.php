<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUrlIsRequired()
    {
        $params = [];
        $this->postJson('/api/subscribe/tech', $params)
            ->assertStatus(422);
    }

    public function testCanSubscribe()
    {
        $params = [
            'url' => 'http://127.0.0.1:8001/api/test'
        ];
        $this->postJson('/api/subscribe/tech', $params)
        ->assertStatus(201)
        ->assertJson([
            "url" => "http://127.0.0.1:8001/api/test",
            "topic" => "tech"
        ]);
    }

}
