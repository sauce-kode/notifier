<?php

namespace App\Services;

use App\Jobs\PublishMessageJob;
use Illuminate\Support\Facades\Redis;

class PublisherService
{

    protected $redis;

    public function __construct()
    {
        $this->redis = Redis::connection();
    }

    public function publish(string $topic, $message)
    {
        $subscribers = $this->redis->lRange($topic, 0, -1);
        PublishMessageJob::dispatch($subscribers, $topic, $message);
        return true;
    }

}
