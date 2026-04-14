<?php

namespace App\Http\Controllers;

use App\Services\StockService;

class StockController extends Controller
{
    public function __construct(protected StockService $stockService)
    {
    }

    public function index()
    {
        $dashboard = $this->stockService->getDashboardData();

        return view('stocks.index', $dashboard);
    }
}
