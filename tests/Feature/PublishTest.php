<?php

namespace Tests\Feature;

use App\Jobs\PublishMessageJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class PublishTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMessageIsRequired()
    {
        $params = [];
        $this->postJson('/api/publish/tech', $params)
            ->assertStatus(422)
            ->assertSee("The message field is required.");
    }

    public function testCanPublish()
    {
        $params = [
            "message" => 'Name is John Doe'
        ];

        Queue::fake();

        $this->postJson('/api/publish/tech', $params)
            ->assertStatus(201)
            ->assertJson([
                "topic" => "tech",
                "data" => "Name is John Doe"
            ]);

        Queue::assertPushed(PublishMessageJob::class);

    }

}
