<?php

namespace App\Http\Controllers;

use App\Services\OrderAnalyticService;
use Illuminate\Http\JsonResponse;

class OrdersController extends Controller
{
    /**
     * @param OrderAnalyticService $service
     *
     * @return JsonResponse
     */
    public function analytic(OrderAnalyticService $service): JsonResponse
    {
        return response()->json($service->handler());
    }
}
