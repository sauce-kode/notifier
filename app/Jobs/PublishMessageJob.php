<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class PublishMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $subscribers, $topic, $message;

    public function __construct(array $subscribers, string $topic, $message)
    {
        $this->subscribers = $subscribers;
        $this->topic = $topic;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            foreach ($this->subscribers as $subscriber) {
                Http::post($subscriber, ['topic' => $this->topic, 'data' => $this->message]);
             }
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
