<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscriptionRequest;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{

    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function create(CreateSubscriptionRequest $request, $topic)
    {
        $this->subscriptionService->subscribe($request->url, $topic);
        return response()->json([
            'url' => $request->url,
            'topic' => $topic
        ], 201);
    }
}
