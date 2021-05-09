<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class SubscriptionService
{
    protected $redis;

    public function __construct()
    {
        $this->redis = Redis::connection();
    }

    public function subscribe(string $url, string $topic)
    {
        if(!$this->keyExists($topic))
        {
            $this->addSubscriber($topic, $url);
        }else {
            $subscribers = $this->redis->lRange($topic, 0, -1);
            if(!in_array($url, $subscribers))
            {
                $this->addSubscriber($topic, $url);
            }
        }
        return true;
    }

    private function keyExists(string $key)
    {
        return $this->redis->exists($key);
    }

    private function addSubscriber($topic, $url)
    {
        $this->redis->rPush($topic, $url);
    }

}
