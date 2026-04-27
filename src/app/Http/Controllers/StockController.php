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
        $style =  asset('css/stockes/index.css');
        $dashboard = $this->stockService->getDashboardData();

        return view('stocks.index',  $dashboard, compact('style', 'dashboard'));
    }
}
