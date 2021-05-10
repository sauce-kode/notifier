<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishMessageRequest;
use App\Services\PublisherService;

class PublisherController extends Controller
{
    protected $PublisherService;

    public function __construct(PublisherService $PublisherService)
    {
        $this->PublisherService = $PublisherService;
    }

    public function create(PublishMessageRequest $request, $topic)
    {
        $this->PublisherService->publish($topic, $request->message);
        return response()->json([
            'topic' => $topic,
            'data' => $request->message
        ], 201);
    }

}
